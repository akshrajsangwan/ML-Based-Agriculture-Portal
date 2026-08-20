import pandas as pd
import numpy as np
import joblib
import sys
import os

# Define the header globally as it is used in the Question class
header = ['State_Name', 'District_Name', 'Season', 'Crop'] 

# --- CLASS DEFINITIONS ---
# These must match the training script EXACTLY.

class Question:
    def __init__(self, column, value):
        self.column = column
        self.value = value
    def match(self, example):
        val = example[self.column]
        return val == self.value
    def match2(self, example):
        if example == 'True' or example == 'true' or example == '1':
            return True
        else:
            return False
    def __repr__(self):
        return "Is %s %s %s?" % (
            header[self.column], "==", str(self.value))

def class_counts(Data):
    counts = {}
    for row in Data:
        label = row[-1]
        if label not in counts:
             counts[label] = 0
        counts[label] += 1
    return counts

class Leaf:
    def __init__(self, Data):
        self.predictions = class_counts(Data)

class Decision_Node:
    def __init__(self, question, true_branch, false_branch):
        self.question = question
        self.true_branch = true_branch
        self.false_branch = false_branch

# --- HELPER FUNCTIONS ---

def print_leaf(counts):
    total = sum(counts.values()) * 1.0
    probs = {}
    for lbl in counts.keys():
        probs[lbl] = str(int(counts[lbl] / total * 100)) + "%"
    return probs

def classify(row, node):
    if isinstance(node, Leaf):
        return node.predictions
    if node.question.match(row):
        return classify(row, node.true_branch)
    else:
        return classify(row, node.false_branch)

# --- MAIN EXECUTION ---

if __name__ == "__main__":
    try:
        if len(sys.argv) < 4:
            print("Error: Missing arguments. Expected State, District, Season.")
            sys.exit(1)

        # 1. Clean Inputs
        # .strip() removes whitespace
        # .title() converts "EAST GODAVARI" -> "East Godavari" to match dataset
        state = sys.argv[1].strip().title()
        district = sys.argv[2].strip().title()
        season = sys.argv[3].strip().title()

        # 2. Load Model using Absolute Path
        # This finds the .pkl file in the same directory as this script
        current_dir = os.path.dirname(os.path.abspath(__file__))
        model_path = os.path.join(current_dir, 'filetest2.pkl')
        
        if not os.path.exists(model_path):
            print(f"Error: Model file not found at {model_path}")
            sys.exit(1)

        dt_model_final = joblib.load(model_path)

        # 3. Predict
        testing_data = [[state, district, season]]
        Predict_dict = {}

        for row in testing_data:
            prediction = classify(row, dt_model_final)
            Predict_dict = print_leaf(prediction).copy()

       # 4. Output Results
        if not Predict_dict:
            print("No suitable crop found for these conditions.")
        else:
            # Get all crop names from the dictionary keys
            crops = list(Predict_dict.keys())
            
            # Join them with a comma and a space
            # This will print: "Rice, Maize, Jute"
            print(", ".join(crops))

    except Exception as e:
        # Print error so PHP can capture it
        print(f"Error: {e}")
