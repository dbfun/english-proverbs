Парсер английских пословиц и поговорок
======================================

Парсер имен в MongoDB (proverbs, db.english) с [native-english.ru](http://www.native-english.ru/proverbs/).

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