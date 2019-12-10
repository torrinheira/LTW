rm -f database/place-genie.db

sqlite3 -init database/place-genie.sql database/place-genie.db ".read database/populate.sql"
