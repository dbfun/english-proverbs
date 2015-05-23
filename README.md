# Описание

Парсер английских пословиц и поговорок в MongoDB (proverbs, db.english) с [http://native-english.ru/proverbs/](native-english.ru).

Скачивание:

        ./src/pages/download.sh

Парсинг:

        php parser.php

Пример:

        "source" : "A bad beginning makes a bad ending",
        "translation" : "Плохое начало ведет к плохому концу",
        "russians" : [
                "Плохому началу — плохой конец",
                "Плохое начало не к доброму концу"
        ]