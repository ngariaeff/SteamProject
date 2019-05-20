import pandas as pd
import numpy as np

#pd.set_option('display.max_rows', 500)
#pd.set_option('display.max_columns', 500)
#pd.set_option('display.width', 1000)


filename = 'steam.csv'
pd.set_option('display.max_columns', None)  

names = ['ID', 'Title', 'Purchase', 'Hours', 'Null']
data = pd.read_csv(filename, names=names)
del data['Null']


data = data[data.Purchase != 'purchase']
data = data.drop(['Purchase'], axis=1)


print(data.shape)

print("Number of games : {0}".format(len(data.Title.unique())))
print("Number of users : {0}".format(len(data.ID.unique())))

print(data.describe())


data = data[data.Hours > 5]


data1 = data.groupby('Title', as_index=False)['Hours'].mean()


data3 = data1.drop('Title', axis=1)  


#data1 = data1.sort_values('Hours', ascending=False)

data2 = data.groupby('Title',  as_index=False)['Hours'].count()

data4 = pd.concat([data2, data3], axis=1)

#data2 = data2.sort_values('Hours', ascending=False)


data4.columns.values[1] = "Total_Purchases"

print(data4)


ratings = data.pivot_table(index='ID', columns='Title', values='Hours')



#change game
game = ratings['Grand Theft Auto IV']


similargame = ratings.corrwith(game)

corr_game = pd.DataFrame(similargame, columns=['Correlation'])  
corr_game.dropna(inplace=True)  

corr_game = corr_game.sort_values(by='Correlation', ascending=False)


corr_game2 = pd.merge(corr_game, data4, on='Title')

corr_game2 = corr_game2.drop(['Hours'], axis=1)


corr_game2 = corr_game2[corr_game2 ['Total_Purchases']>50].sort_values('Correlation', ascending=False) 
print(corr_game2)
