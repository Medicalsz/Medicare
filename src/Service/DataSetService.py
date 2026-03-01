import pandas as pd
import sys
import json
import io

class DatasetClient:
    """
    A client to load and inspect a dataset from a file (e.g., CSV).
    """
    def __init__(self, file_path: str):
        """
        Initializes the DatasetClient with the path to the dataset.
        :param file_path: The path to the dataset file.
        """
        self.file_path = file_path
        self.dataset = None

    def load_dataset(self) -> pd.DataFrame:
        """
        Loads the dataset from the specified file path into a pandas DataFrame.
        :return: A pandas DataFrame containing the dataset.
        :raises FileNotFoundError: If the file is not found.
        """
        try:
            self.dataset = pd.read_csv(self.file_path)
            return self.dataset
        except FileNotFoundError:
            print(json.dumps({"error": f"The file was not found at {self.file_path}"}))
            raise

    def get_summary_data(self) -> dict:
        """
        Gathers all dataset information into a single dictionary.
        :return: A dictionary containing dataset info, head, and chart data.
        """
        if self.dataset is None:
            return {"error": "Dataset not loaded."}

        # Capture pandas .info() output into a string
        info_stream = io.StringIO()
        self.dataset.info(buf=info_stream)
        info_string = info_stream.getvalue()

        # Get data for charts
        condition_counts = self.dataset['Condition'].value_counts()
        gender_counts = self.dataset['Gender'].value_counts()
        blood_type_counts = self.dataset['BloodType'].value_counts()

        # Calculate summary statistics
        total_patients = len(self.dataset)
        average_age = self.dataset['Age'].mean()
        unique_conditions = self.dataset['Condition'].nunique()

        summary = {
            "info": info_string,
            "head": self.dataset.head().to_html(classes='table table-striped table-sm', index=False, border=0),
            "stats": {
                "total_patients": total_patients,
                "average_age": round(average_age, 1),
                "unique_conditions": unique_conditions
            },
            "condition_chart": {
                "labels": condition_counts.index.tolist(),
                "data": condition_counts.values.tolist(),
            },
            "gender_chart": {
                "labels": gender_counts.index.tolist(),
                "data": gender_counts.values.tolist(),
            },
            "blood_type_chart": {
                "labels": blood_type_counts.index.tolist(),
                "data": blood_type_counts.values.tolist(),
            }
        }
        return summary

if __name__ == '__main__':
    if len(sys.argv) > 1:
        file_path = sys.argv[1]
        try:
            client = DatasetClient(file_path)
            client.load_dataset()
            summary_data = client.get_summary_data()
            print(json.dumps(summary_data))
        except FileNotFoundError:
            # The error is already handled in load_dataset, so just exit.
            pass
        except Exception as e:
            print(json.dumps({"error": f"An unexpected error occurred: {str(e)}"}))
    else:
        print(json.dumps({"error": "Usage: python DataSetService.py <path_to_dataset>"}))