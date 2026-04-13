package com.medicare.controllers;

import com.medicare.models.ForumComment;
import com.medicare.models.ForumTopic;
import com.medicare.models.User;
import com.medicare.services.CommentService;
import com.medicare.services.ForumService;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.Tooltip;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.Region;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import org.kordamp.ikonli.fontawesome5.FontAwesomeSolid;
import org.kordamp.ikonli.javafx.FontIcon;

import java.time.format.DateTimeFormatter;
import java.util.List;

public class ForumDetailController extends ForumController {

    @FXML private Label titleLabel;
    @FXML private Label metaLabel;
    @FXML private Label typeBadgeLabel;
    @FXML private Label reportedStatusLabel;
    @FXML private Label hiddenStatusLabel;
    @FXML private VBox summaryBox;
    @FXML private Label summaryLabel;
    @FXML private Label contentLabel;
    @FXML private VBox videoBox;
    @FXML private Label videoUrlLabel;
    @FXML private FlowPane tagsPane;
    @FXML private Label commentsStatsLabel;
    @FXML private Label emptyCommentsLabel;
    @FXML private VBox commentsContainer;
    @FXML private TextArea newCommentArea;
    @FXML private Label commentErrorLabel;
    @FXML private Button addCommentButton;
    @FXML private Button editButton;
    @FXML private Button toggleReportedButton;
    @FXML private Button toggleHiddenButton;
    @FXML private Button deleteButton;

    private final ForumService forumService = new ForumService();
    private final CommentService commentService = new CommentService();
    private final DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");

    private int topicId;
    private ForumTopic currentTopic;

    public void setTopicId(int topicId) {
        this.topicId = topicId;
        loadTopicAndComments();
    }

    @Override
    protected void onForumContextReady() {
        User user = resolveCurrentUser();
        addCommentButton.setDisable(user == null);
        if (topicId > 0) {
            loadTopicAndComments();
        }
    }

    @FXML
    private void onBackClick() {
        openForumList();
    }

    @FXML
    private void onEditClick() {
        if (currentTopic != null) {
            openForumForm(currentTopic);
        }
    }

    @FXML
    private void onToggleReportedClick() {
        User user = resolveCurrentUser();
        if (currentTopic == null || user == null || !user.hasRole("ROLE_ADMIN")) {
            showError("Seul un administrateur peut modifier le signalement du sujet.", null);
            return;
        }

        boolean newState = !currentTopic.isReported();
        String action = newState ? "signaler" : "retirer le signalement de";
        if (!confirm("Moderation sujet", "Voulez-vous " + action + " ce sujet ?")) {
            return;
        }

        try {
            forumService.setTopicReported(currentTopic.getId(), newState, newState ? user.getId() : null);
            loadTopicAndComments();
        } catch (Exception e) {
            showError("Impossible de mettre a jour le signalement du sujet.", e);
        }
    }

    @FXML
    private void onToggleHiddenClick() {
        User user = resolveCurrentUser();
        if (currentTopic == null || user == null || !user.hasRole("ROLE_ADMIN")) {
            showError("Seul un administrateur peut masquer ou afficher un sujet.", null);
            return;
        }

        boolean newState = !currentTopic.isHidden();
        String action = newState ? "masquer" : "rendre visible";
        if (!confirm("Moderation sujet", "Voulez-vous " + action + " ce sujet ?")) {
            return;
        }

        try {
            forumService.setTopicHidden(currentTopic.getId(), newState);
            loadTopicAndComments();
        } catch (Exception e) {
            showError("Impossible de mettre a jour la visibilite du sujet.", e);
        }
    }

    @FXML
    private void onDeleteClick() {
        if (currentTopic == null) {
            return;
        }
        if (!confirm("Supprimer le sujet", "Voulez-vous vraiment supprimer ce sujet et tous ses commentaires ?")) {
            return;
        }

        try {
            forumService.deleteTopic(currentTopic.getId());
            showInfo("Forum", "Le sujet a bien ete supprime.");
            openForumList();
        } catch (Exception e) {
            showError("Impossible de supprimer le sujet.", e);
        }
    }

    @FXML
    private void onAddCommentClick() {
        User user = resolveCurrentUser();
        if (user == null) {
            commentErrorLabel.setText("Connectez-vous pour commenter.");
            return;
        }
        if (currentTopic == null) {
            commentErrorLabel.setText("Sujet introuvable.");
            return;
        }
        if (newCommentArea.getText().isBlank()) {
            commentErrorLabel.setText("Le commentaire ne peut pas etre vide.");
            return;
        }

        ForumComment comment = new ForumComment();
        comment.setAuthorId(user.getId());
        comment.setTopicId(currentTopic.getId());
        comment.setContent(newCommentArea.getText());

        try {
            commentService.addComment(comment);
            newCommentArea.clear();
            commentErrorLabel.setText("");
            loadComments();
        } catch (Exception e) {
            commentErrorLabel.setText("Impossible d'ajouter le commentaire.");
            e.printStackTrace();
        }
    }

    private void loadTopicAndComments() {
        if (topicId <= 0) {
            return;
        }

        try {
            currentTopic = forumService.findById(topicId, isAdmin());
            if (currentTopic == null) {
                showError("Le sujet demande est introuvable.", null);
                openForumList();
                return;
            }
            populateTopic();
            loadComments();
        } catch (Exception e) {
            showError("Impossible de charger le detail du sujet.", e);
        }
    }

    private void populateTopic() {
        titleLabel.setText(currentTopic.getTitle());
        metaLabel.setText(
                (currentTopic.getAuthorName() != null ? currentTopic.getAuthorName() : "Auteur inconnu") +
                        " - " + roleLabel(currentTopic.getAuthorRoles()) +
                        " - " + (currentTopic.getCreatedAt() != null ? currentTopic.getCreatedAt().format(dateFormatter) : "-")
        );

        typeBadgeLabel.setText(currentTopic.getDisplayType());
        typeBadgeLabel.setStyle("-fx-background-color: " + (currentTopic.isVideo() ? "#fed7aa" : "#dbeafe") + "; " +
                "-fx-text-fill: " + (currentTopic.isVideo() ? "#c2410c" : "#1d4ed8") + "; " +
                "-fx-font-size: 11px; -fx-font-weight: bold; -fx-background-radius: 999; -fx-padding: 4 10;");

        updateStatusBadge(reportedStatusLabel, currentTopic.isReported(), "Sujet signale", "#fef3c7", "#b45309");
        updateStatusBadge(hiddenStatusLabel, currentTopic.isHidden(), "Sujet masque", "#e2e8f0", "#475569");

        summaryBox.setVisible(currentTopic.getSummary() != null && !currentTopic.getSummary().isBlank());
        summaryBox.setManaged(summaryBox.isVisible());
        summaryLabel.setText(currentTopic.getSummary());

        contentLabel.setText(currentTopic.getContent());

        boolean hasVideo = currentTopic.getVideoUrl() != null && !currentTopic.getVideoUrl().isBlank();
        videoBox.setVisible(hasVideo);
        videoBox.setManaged(hasVideo);
        videoUrlLabel.setText(hasVideo ? currentTopic.getVideoUrl() : "");

        tagsPane.getChildren().clear();
        String tagsDisplay = currentTopic.getTagsDisplay();
        if (!tagsDisplay.isBlank()) {
            for (String tag : tagsDisplay.split(",")) {
                String clean = tag.trim();
                if (clean.isEmpty()) {
                    continue;
                }
                Label tagLabel = new Label("#" + clean);
                tagLabel.setStyle("-fx-background-color: #f1f5f9; -fx-text-fill: #475569; " +
                        "-fx-font-size: 11px; -fx-background-radius: 999; -fx-padding: 4 10;");
                tagsPane.getChildren().add(tagLabel);
            }
        }

        boolean canManage = canManageTopic(currentTopic);
        editButton.setVisible(canManage);
        editButton.setManaged(canManage);
        deleteButton.setVisible(canManage);
        deleteButton.setManaged(canManage);

        boolean admin = isAdmin();
        toggleReportedButton.setVisible(admin);
        toggleReportedButton.setManaged(admin);
        toggleHiddenButton.setVisible(admin);
        toggleHiddenButton.setManaged(admin);
        if (admin) {
            toggleReportedButton.setText(currentTopic.isReported() ? "Retirer signalement" : "Signaler");
            toggleHiddenButton.setText(currentTopic.isHidden() ? "Afficher le sujet" : "Masquer le sujet");
        }
    }

    private void loadComments() {
        commentsContainer.getChildren().clear();

        List<ForumComment> comments = commentService.findByTopicId(topicId, isAdmin());
        commentsStatsLabel.setText(comments.size() + (comments.size() > 1 ? " commentaires" : " commentaire"));
        emptyCommentsLabel.setVisible(comments.isEmpty());
        emptyCommentsLabel.setManaged(comments.isEmpty());

        if (comments.isEmpty()) {
            return;
        }

        for (ForumComment comment : comments) {
            VBox card = new VBox(10);
            card.setPadding(new Insets(14));
            card.setStyle("-fx-background-color: #ffffff; -fx-background-radius: 12; " +
                    "-fx-border-color: #e2e8f0; -fx-border-radius: 12;");

            HBox header = new HBox(8);
            header.setAlignment(Pos.CENTER_LEFT);

            FontIcon icon = new FontIcon(FontAwesomeSolid.USER_CIRCLE);
            icon.setIconSize(18);
            icon.setIconColor(Color.web(roleColor(comment.getAuthorRoles())));

            Label roleBadge = new Label(roleLabel(comment.getAuthorRoles()));
            roleBadge.setStyle("-fx-background-color: " + roleColor(comment.getAuthorRoles()) + "; " +
                    "-fx-text-fill: white; -fx-font-size: 10px; -fx-font-weight: bold; " +
                    "-fx-background-radius: 999; -fx-padding: 3 9;");

            Label authorLabel = new Label(
                    (comment.getAuthorName() != null ? comment.getAuthorName() : "Auteur inconnu") +
                            " - " + (comment.getCreatedAt() != null ? comment.getCreatedAt().format(dateFormatter) : "-")
            );
            authorLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #64748b;");

            header.getChildren().addAll(icon, roleBadge, authorLabel);

            if (comment.isReported()) {
                header.getChildren().add(createBadge("Signale", "#fef3c7", "#b45309"));
            }
            if (comment.isHidden()) {
                header.getChildren().add(createBadge("Masque", "#e2e8f0", "#475569"));
            }

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);
            header.getChildren().add(spacer);

            if (isAdmin()) {
                Button reportCommentButton = createIconButton(
                        FontAwesomeSolid.FLAG,
                        comment.isReported() ? "#b91c1c" : "#b45309",
                        comment.isReported() ? "#fee2e2" : "#fef3c7",
                        comment.isReported() ? "Retirer le signalement" : "Marquer comme signale"
                );
                reportCommentButton.setOnAction(event -> toggleCommentReported(comment));
                header.getChildren().add(reportCommentButton);
            }

            if (canManageComment(comment.getAuthorId())) {
                Button deleteCommentButton = createIconButton(
                        FontAwesomeSolid.TRASH_ALT,
                        "#dc2626",
                        "#fee2e2",
                        "Supprimer"
                );
                deleteCommentButton.setOnAction(event -> deleteComment(comment.getId()));
                header.getChildren().add(deleteCommentButton);
            }

            Label content = new Label(comment.getContent());
            content.setWrapText(true);
            content.setStyle("-fx-font-size: 13px; -fx-text-fill: #334155; -fx-line-spacing: 2;");

            card.getChildren().addAll(header, content);
            commentsContainer.getChildren().add(card);
        }
    }

    private void toggleCommentReported(ForumComment comment) {
        User user = resolveCurrentUser();
        if (user == null || !user.hasRole("ROLE_ADMIN")) {
            showError("Seul un administrateur peut modifier le signalement d'un commentaire.", null);
            return;
        }

        boolean newState = !comment.isReported();
        String action = newState ? "signaler" : "retirer le signalement de";
        if (!confirm("Moderation commentaire", "Voulez-vous " + action + " ce commentaire ?")) {
            return;
        }

        try {
            commentService.setCommentReported(comment.getId(), newState, newState ? user.getId() : null);
            loadComments();
        } catch (Exception e) {
            showError("Impossible de mettre a jour le signalement du commentaire.", e);
        }
    }

    private void deleteComment(int commentId) {
        if (!confirm("Supprimer le commentaire", "Voulez-vous vraiment supprimer ce commentaire ?")) {
            return;
        }

        try {
            commentService.deleteComment(commentId);
            loadComments();
        } catch (Exception e) {
            showError("Impossible de supprimer le commentaire.", e);
        }
    }

    private void updateStatusBadge(Label label, boolean visible, String text, String backgroundColor, String textColor) {
        label.setVisible(visible);
        label.setManaged(visible);
        if (!visible) {
            label.setText("");
            return;
        }
        label.setText(text);
        label.setStyle("-fx-background-color: " + backgroundColor + "; -fx-text-fill: " + textColor + "; " +
                "-fx-font-size: 11px; -fx-font-weight: bold; -fx-background-radius: 999; -fx-padding: 4 10;");
    }

    private Label createBadge(String text, String backgroundColor, String textColor) {
        Label label = new Label(text);
        label.setStyle("-fx-background-color: " + backgroundColor + "; -fx-text-fill: " + textColor + "; " +
                "-fx-font-size: 10px; -fx-font-weight: bold; -fx-background-radius: 999; -fx-padding: 3 9;");
        return label;
    }

    private Button createIconButton(FontAwesomeSolid iconType, String iconColor, String backgroundColor, String tooltip) {
        Button button = new Button();
        FontIcon icon = new FontIcon(iconType);
        icon.setIconSize(12);
        icon.setIconColor(Color.web(iconColor));
        button.setGraphic(icon);
        button.setStyle("-fx-background-color: " + backgroundColor + "; -fx-background-radius: 8; -fx-cursor: hand;");
        button.setTooltip(new Tooltip(tooltip));
        return button;
    }
}
