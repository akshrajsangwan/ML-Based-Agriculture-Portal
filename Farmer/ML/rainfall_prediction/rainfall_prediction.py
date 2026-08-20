import pandas as pd
import sys


df = pd.read_csv('ML/rainfall_prediction/rainfall_in_india_1901-2015.csv')


def predict_rainfall(state, month):
  
    state_data = df[df['SUBDIVISION'] == state]


    avg_rainfall = state_data[month].mean()
    
    
    return avg_rainfall


Jregion = sys.argv[1]
Jmonth = sys.argv[2]



predicted_rainfall = predict_rainfall(Jregion, Jmonth)
print(predicted_rainfall)


