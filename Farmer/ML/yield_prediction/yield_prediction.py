import pandas as pd
import numpy as np
import json
import sys
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import OneHotEncoder

df = pd.read_csv("ML/yield_prediction/crop_production_karnataka.csv")

df = df.drop(['Crop_Year'], axis=1)

X = df.drop(['Production'], axis=1)
y = df['Production']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

categorical_cols = ['State_Name', 'District_Name', 'Season', 'Crop']

ohe = OneHotEncoder(handle_unknown='ignore')
ohe.fit(X_train[categorical_cols])

X_train_categorical = ohe.transform(X_train[categorical_cols])
X_test_categorical = ohe.transform(X_test[categorical_cols])

X_train_final = np.hstack((X_train_categorical.toarray(), X_train.drop(categorical_cols, axis=1)))
X_test_final = np.hstack((X_test_categorical.toarray(), X_test.drop(categorical_cols, axis=1)))

model = RandomForestRegressor(n_estimators=100, random_state=42)
model.fit(X_train_final, y_train)

Jstate = sys.argv[1]
Jdistrict = sys.argv[2]
Jseason = sys.argv[3]
Jcrops = sys.argv[4]
Jarea = sys.argv[5]

user_input = np.array([[Jstate,Jdistrict,Jseason,Jcrops,Jarea]])

user_input_categorical = ohe.transform(user_input[:, :4])

user_input_final = np.hstack((user_input_categorical.toarray(), user_input[:, 4:].astype(float)))

prediction = model.predict(user_input_final)

print(str(prediction[0]))



