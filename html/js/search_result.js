//SCRIPT PER I FILTRI NELLA PAGINA search_result.php:
films = document.getElementById('film');
series = document.getElementById('series');
people = document.getElementById('people');

console.log(people)
document.getElementById('filmbutton').addEventListener('click', function () {
    if (films.classList.contains('hidden')) {
        films.classList.remove('hidden');
    }
    if (!series.classList.contains('hidden')) {
        series.classList.add('hidden');
    }
    if (!people.classList.contains('hidden')) {
        people.classList.add('hidden');
    }
})

document.getElementById('seriesbutton').addEventListener('click', function () {
    if (series.classList.contains('hidden')) {
        series.classList.remove('hidden');
    }
    if (!films.classList.contains('hidden')) {
        films.classList.add('hidden');
    }
    if (!people.classList.contains('hidden')) {
        people.classList.add('hidden');
    }
})

document.getElementById('peoplebutton').addEventListener('click', function () {
    if (people.classList.contains('hidden')) {
        people.classList.remove('hidden');
    }
    if (!films.classList.contains('hidden')) {
        films.classList.add('hidden');
    }
    if (!series.classList.contains('hidden')) {
        series.classList.add('hidden');
    }
})

document.getElementById('allbutton').addEventListener('click', function () {

    if (films.classList.contains('hidden')) {
        films.classList.remove('hidden');
    }
    if (series.classList.contains('hidden')) {
        series.classList.remove('hidden');
    }
    if (document.getElementById('people')) {
        if (people.classList.contains('hidden')) {
            people.classList.remove('hidden');
        }
    }

})

