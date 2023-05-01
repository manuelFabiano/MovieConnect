films = document.getElementById('film');
    series = document.getElementById('series');
    people = document.getElementById('people');

    document.getElementById('filmbutton').addEventListener('click', function() {
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

    document.getElementById('seriesbutton').addEventListener('click', function() {
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


    document.getElementById('allbutton').addEventListener('click', function() {
        if (films.classList.contains('hidden')) {
            films.classList.remove('hidden');
        }
        if (series.classList.contains('hidden')) {
            series.classList.remove('hidden');
        }

    })


    visti = document.querySelectorAll('.visto');
    daVedere = document.querySelectorAll('.davedere');

    document.getElementById('watchedbutton').addEventListener('click', function() {
        visti.forEach(function(visti) {
            if (visti.classList.contains('hidden')) {
                visti.classList.remove('hidden');
            }
        });

        daVedere.forEach(function(daVedere) {
            daVedere.classList.add('hidden');
        });
    })

    document.getElementById('towatchbutton').addEventListener('click', function() {
        daVedere.forEach(function(daVedere) {
            if (daVedere.classList.contains('hidden')) {
                daVedere.classList.remove('hidden');
            }
        });

        visti.forEach(function(visti) {
            visti.classList.add('hidden');
        });
    })