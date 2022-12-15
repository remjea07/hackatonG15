#usr/bin/python
import csv


def get_films_with_tag_or_titre(list_films: list[str], tag: str) -> list[str]:
    tag = tag.lower()
    return [film for film in list_films if tag in film[4].lower() or tag in film[6].lower()]


def get_number_genres_in_film(film: str, genres: list[str]) -> int:
    result = 0
    for genre in genres:
        if genre in film[1]:
            result += 1
    return result


def get_films(f, genres: list[str]) -> list:
    csv_reader = csv.reader(f)
    list_films = []
    for row in csv_reader:
        for genre in genres:
            if genre in row[1]:
                list_films.append(row)
                break
    return list_films


def sort_list_films_by_popularity(list_films: list[str]) -> list[str]:
    if len(list_films) < 2:
        return list_films
    else:
        return sort_list_films_by_popularity([film for film in list_films if float(film[8]) > float(list_films[0][8])]) + \
               [list_films[0]] + \
               sort_list_films_by_popularity([film for film in list_films if float(film[8]) < float(list_films[0][8])])


def sort_list_films_by_genre(list_films: list[str], genres: list[str]) -> list[str]:
    number_genres_in_film = {i + 1: [] for i in range(len(genres))}
    for film in list_films:
        number = get_number_genres_in_film(film, genres)
        number_genres_in_film[number].append(film)
    final_list_films = []
    for i in range(len(genres), 0, -1):
        final_list_films += number_genres_in_film[i]
    return final_list_films


def sort_list_films(list_films: list[str], genres: list[str]=None, tag: str=None) -> list[str]:
    if tag != None:
        list_films = get_films_with_tag_or_titre(list_films, tag)
    list_films = sort_list_films_by_popularity(list_films)
    if genres != None:
        list_films = sort_list_films_by_genre(list_films, genres)
    return list_films


with open("tmdb_5000_movies.csv", "r") as file:
    list_films = get_films(file, ["Action", "Drama"])
    list_films = sort_list_films(list_films, ["Action", "Drama"], 'party')
    for film in list_films:
        print(film)