#usr/bin/python
import csv

def get_number_genres_in_film(film: str, genres: list[str]) -> int:
    result = 0
    for genre in genres:
        if genre in film[1]:
            result += 1
    return result


def sort_list_films(list_films: list[str], genres: list[str]) -> list[str]:
    number_genres_in_film = {i + 1: [] for i in range(len(genres))}
    for film in list_films:
        number = get_number_genres_in_film(film, genres)
        number_genres_in_film[number].append(film)
    final_list_films = []
    for i in range(len(genres), 0, -1):
        final_list_films += number_genres_in_film[i]
    return final_list_films


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
    list_films = sort_list_films(list_films, ["Action", "Drama"])
    for film in list_films:
        print(film[8])
