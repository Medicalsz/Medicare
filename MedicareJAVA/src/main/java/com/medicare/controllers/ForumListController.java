package com.medicare.controllers;

import com.medicare.models.ForumTopic;
import com.medicare.models.User;
import com.medicare.services.ForumService;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.control.Tooltip;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import org.kordamp.ikonli.fontawesome5.FontAwesomeSolid;
import org.kordamp.ikonli.javafx.FontIcon;

import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;

public class ForumListController extends ForumController {

    @FXML private TextField searchField;
    @FXML private ComboBox<String> typeFilterCombo;
    @FXML private CheckBox showHiddenCheckBox;
    @FXML private Label headerStatsLabel;
    @FXML private Label errorLabel;
    @FXML private Label emptyLabel;
    @FXML private Button addButton;
    @FXML private Button moderationButton;
    @FXML private VBox topicsContainer;

    private final ForumService forumService = new ForumService();
    private final DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");

    private List<ForumTopic> allTopics = new ArrayList<>();

    @FXML
    private void initialize() {
        typeFilterCombo.getItems().setAll("Tous", "Article", "Video");
        typeFilterCombo.setValue("Tous");
        searchField.textProperty().addListener((obs, oldValue, newValue) -> applyFilters());
        typeFilterCombo.valueProperty().addListener((obs, oldValue, newValue) -> applyFilters());
        showHiddenCheckBox.selectedProperty().addListener((obs, oldValue, newValue) -> loadTopics());
        loadTopics();
    }

    @Override
    protected void onForumContextReady() {
        User user = resolveCurrentUser();
        boolean admin = isAdmin();
        addButton.setDisable(user == null);
        addButton.setVisible(true);
        moderationButton.setVisible(admin);
        moderationButton.setManaged(admin);
        showHiddenCheckBox.setVisible(admin);
        showHiddenCheckBox.setManaged(admin);
        if (!admin) {
            showHiddenCheckBox.setSelected(false);
        }
        loadTopics();
    }

    @FXML
    private void onAddTopicClick() {
        if (resolveCurrentUser() == null) {
            errorLabel.setText("Connectez-vous pour publier un sujet.");
            return;
        }
        errorLabel.setText("");
        openForumForm(null);
    }

    @FXML
    private void onModerationClick() {
        if (!isAdmin()) {
            showError("Cet espace est reserve aux administrateurs.", null);
            return;
        }
        openForumModeration();
    }

    private void loadTopics() {
        try {
            allTopics = forumService.findAll(isAdmin() && showHiddenCheckBox.isSelected());
            errorLabel.setText("");
            applyFilters();
        } catch (Exception e) {
            errorLabel.setText("Impossible de charger les sujets du forum.");
            e.printStackTrace();
        }
    }

    private void applyFilters() {
        String query = searchField == null ? "" : searchField.getText();
        String typeFilter = typeFilterCombo == null ? "Tous" : typeFilterCombo.getValue();

        List<ForumTopic> filtered = allTopics.stream()
                .filter(topic -> topic.matchesSearch(query))
                .filter(topic -> "Tous".equalsIgnoreCase(typeFilter) || topic.getDisplayType().equalsIgnoreCase(typeFilter))
                .toList();

        renderTopics(filtered);
    }

    private void renderTopics(List<ForumTopic> topics) {
        if (topicsContainer == null) {
            return;
        }

        topicsContainer.getChildren().clear();
        long hiddenCount = topics.stream().filter(ForumTopic::isHidden).count();
        if (isAdmin() && showHiddenCheckBox.isSelected()) {
            headerStatsLabel.setText(
                    topics.size() + (topics.size() > 1 ? " sujets charges" : " sujet charge") +
                            (hiddenCount > 0 ? " - " + hiddenCount + " masque(s)" : "")
            );
        } else {
            headerStatsLabel.setText(topics.size() + (topics.size() > 1 ? " sujets visibles" : " sujet visible"));
        }
        emptyLabel.setVisible(topics.isEmpty());
        emptyLabel.setManaged(topics.isEmpty());

        if (topics.isEmpty()) {
            return;
        }

        for (ForumTopic topic : topics) {
            VBox card = new VBox(12);
            card.setPadding(new Insets(18));
            String borderColor = topic.isHidden() ? "#94a3b8" : (topic.isReported() ? "#f59e0b" : "transparent");
            card.setStyle("-fx-background-color: white; -fx-background-radius: 14; " +
                    "-fx-border-color: " + borderColor + "; -fx-border-radius: 14; -fx-border-width: " +
                    (topic.hasModerationFlag() ? "1.2" : "0") + "; " +
                    "-fx-effect: dropshadow(gaussian, rgba(15,23,42,0.08), 14, 0, 0, 3);");

            HBox topRow = new HBox(12);
            topRow.setAlignment(Pos.CENTER_LEFT);

            VBox titleBox = new VBox(6);
            HBox.setHgrow(titleBox, Priority.ALWAYS);

            Label titleLabel = new Label(topic.getTitle());
            titleLabel.setWrapText(true);
            titleLabel.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #0f172a;");

            HBox metaRow = new HBox(8);
            metaRow.setAlignment(Pos.CENTER_LEFT);

            Label authorBadge = new Label(roleLabel(topic.getAuthorRoles()));
            authorBadge.setStyle("-fx-background-color: " + roleColor(topic.getAuthorRoles()) + "; " +
                    "-fx-text-fill: white; -fx-font-size: 11px; -fx-font-weight: bold; " +
                    "-fx-background-radius: 999; -fx-padding: 3 10;");

            Label metaLabel = new Label(
                    (topic.getAuthorName() != null ? topic.getAuthorName() : "Auteur inconnu") +
                            " - " + (topic.getCreatedAt() != null ? topic.getCreatedAt().format(dateFormatter) : "-") +
                            " - " + topic.getCommentCount() + (topic.getCommentCount() > 1 ? " commentaires" : " commentaire")
            );
            metaLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #64748b;");

            Label typeBadge = new Label(topic.getDisplayType());
            typeBadge.setStyle("-fx-background-color: " + (topic.isVideo() ? "#fed7aa" : "#dbeafe") + "; " +
                    "-fx-text-fill: " + (topic.isVideo() ? "#c2410c" : "#1d4ed8") + "; " +
                    "-fx-font-size: 11px; -fx-font-weight: bold; -fx-background-radius: 999; -fx-padding: 3 10;");

            metaRow.getChildren().addAll(authorBadge, metaLabel, typeBadge);
            titleBox.getChildren().addAll(titleLabel, metaRow);

            FlowPane moderationPane = buildModerationBadges(topic);
            if (!moderationPane.getChildren().isEmpty()) {
                titleBox.getChildren().add(moderationPane);
            }

            HBox actions = new HBox(8);
            actions.setAlignment(Pos.CENTER_RIGHT);

            Button detailsButton = createActionButton(FontAwesomeSolid.EYE, "#1d4ed8", "#dbeafe", "Voir les details");
            detailsButton.setOnAction(event -> openForumDetail(topic.getId()));
            actions.getChildren().add(detailsButton);

            if (isAdmin()) {
                Button reportButton = createActionButton(
                        FontAwesomeSolid.FLAG,
                        topic.isReported() ? "#b91c1c" : "#b45309",
                        topic.isReported() ? "#fee2e2" : "#fef3c7",
                        topic.isReported() ? "Retirer le signalement" : "Marquer comme signale"
                );
                reportButton.setOnAction(event -> toggleTopicReported(topic));

                Button hiddenButton = createActionButton(
                        topic.isHidden() ? FontAwesomeSolid.EYE : FontAwesomeSolid.EYE_SLASH,
                        topic.isHidden() ? "#0f766e" : "#475569",
                        topic.isHidden() ? "#ccfbf1" : "#e2e8f0",
                        topic.isHidden() ? "Afficher le sujet" : "Masquer le sujet"
                );
                hiddenButton.setOnAction(event -> toggleTopicHidden(topic));
                actions.getChildren().addAll(reportButton, hiddenButton);
            }

            if (canManageTopic(topic)) {
                Button editButton = createActionButton(FontAwesomeSolid.PEN, "#c2410c", "#ffedd5", "Modifier");
                editButton.setOnAction(event -> openForumForm(topic));

                Button deleteButton = createActionButton(FontAwesomeSolid.TRASH_ALT, "#dc2626", "#fee2e2", "Supprimer");
                deleteButton.setOnAction(event -> deleteTopic(topic));
                actions.getChildren().addAll(editButton, deleteButton);
            }

            topRow.getChildren().addAll(titleBox, actions);

            Label summaryLabel = new Label(topic.getDisplaySummary());
            summaryLabel.setWrapText(true);
            summaryLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #334155; -fx-line-spacing: 2;");

            VBox optionalBlock = new VBox(8);
            if (topic.isVideo() && topic.getVideoUrl() != null && !topic.getVideoUrl().isBlank()) {
                Label videoLabel = new Label("Video : " + topic.getVideoUrl());
                videoLabel.setWrapText(true);
                videoLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #9a3412;");
                optionalBlock.getChildren().add(videoLabel);
            }

            FlowPane tagPane = buildTags(topic);

            card.getChildren().addAll(topRow, summaryLabel);
            if (!optionalBlock.getChildren().isEmpty()) {
                card.getChildren().add(optionalBlock);
            }
            if (!tagPane.getChildren().isEmpty()) {
                card.getChildren().add(tagPane);
            }

            topicsContainer.getChildren().add(card);
        }
    }

    private FlowPane buildModerationBadges(ForumTopic topic) {
        FlowPane pane = new FlowPane();
        pane.setHgap(8);
        pane.setVgap(8);

        if (topic.isReported()) {
            pane.getChildren().add(createBadge("Signale", "#fef3c7", "#b45309"));
        }
        if (topic.isHidden()) {
            pane.getChildren().add(createBadge("Masque", "#e2e8f0", "#475569"));
        }

        return pane;
    }

    private FlowPane buildTags(ForumTopic topic) {
        FlowPane pane = new FlowPane();
        pane.setHgap(8);
        pane.setVgap(8);

        String tagsDisplay = topic.getTagsDisplay();
        if (tagsDisplay.isBlank()) {
            return pane;
        }

        String[] tags = tagsDisplay.split(",");
        for (String tag : tags) {
            String clean = tag.trim();
            if (clean.isEmpty()) {
                continue;
            }
            Label label = new Label("#" + clean);
            label.setStyle("-fx-background-color: #f1f5f9; -fx-text-fill: #475569; " +
                    "-fx-font-size: 11px; -fx-background-radius: 999; -fx-padding: 4 10;");
            pane.getChildren().add(label);
        }
        return pane;
    }

    private Label createBadge(String text, String backgroundColor, String textColor) {
        Label label = new Label(text);
        label.setStyle("-fx-background-color: " + backgroundColor + "; -fx-text-fill: " + textColor + "; " +
                "-fx-font-size: 11px; -fx-font-weight: bold; -fx-background-radius: 999; -fx-padding: 4 10;");
        return label;
    }

    private Button createActionButton(FontAwesomeSolid iconType, String iconColor, String backgroundColor, String tooltip) {
        Button button = new Button();
        FontIcon icon = new FontIcon(iconType);
        icon.setIconSize(13);
        icon.setIconColor(Color.web(iconColor));
        button.setGraphic(icon);
        button.setStyle("-fx-background-color: " + backgroundColor + "; -fx-padding: 7; " +
                "-fx-background-radius: 8; -fx-cursor: hand;");
        button.setTooltip(new Tooltip(tooltip));
        return button;
    }

    private void toggleTopicReported(ForumTopic topic) {
        User user = resolveCurrentUser();
        if (user == null || !user.hasRole("ROLE_ADMIN")) {
            showError("Seul un administrateur peut modifier le signalement d'un sujet.", null);
            return;
        }

        boolean newState = !topic.isReported();
        String action = newState ? "signaler" : "retirer le signalement de";
        if (!confirm("Moderation sujet", "Voulez-vous " + action + " ce sujet ?")) {
            return;
        }

        try {
            forumService.setTopicReported(topic.getId(), newState, newState ? user.getId() : null);
            loadTopics();
        } catch (Exception e) {
            showError("Impossible de mettre a jour le signalement du sujet.", e);
        }
    }

    private void toggleTopicHidden(ForumTopic topic) {
        User user = resolveCurrentUser();
        if (user == null || !user.hasRole("ROLE_ADMIN")) {
            showError("Seul un administrateur peut masquer ou afficher un sujet.", null);
            return;
        }

        boolean newState = !topic.isHidden();
        String action = newState ? "masquer" : "rendre visible";
        if (!confirm("Moderation sujet", "Voulez-vous " + action + " ce sujet ?")) {
            return;
        }

        try {
            forumService.setTopicHidden(topic.getId(), newState);
            loadTopics();
        } catch (Exception e) {
            showError("Impossible de mettre a jour la visibilite du sujet.", e);
        }
    }

    private void deleteTopic(ForumTopic topic) {
        if (!confirm("Supprimer le sujet", "Voulez-vous vraiment supprimer ce sujet et ses commentaires ?")) {
            return;
        }

        try {
            forumService.deleteTopic(topic.getId());
            showInfo("Forum", "Le sujet a bien ete supprime.");
            loadTopics();
        } catch (Exception e) {
            showError("Impossible de supprimer le sujet.", e);
        }
    }
}
