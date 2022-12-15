#usr/bin/python
import csv


def get_films(f, genres: list[str]) -> list:
    csv_reader = csv.reader(f)
    list_films = []
    for row in csv_reader:
        for genre in genres:
            if genre in row[1]:
                list_films.append(row)
                break
    # use "return list_films[6]" for return only names of films
    return list_films


with open("tmdb_5000_movies.csv", "r") as file:
    list_films = get_films(file, ["Action", "Drama"])
    for film in list_films:
        print(film)
