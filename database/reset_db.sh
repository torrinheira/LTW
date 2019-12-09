rm -f db/database.db

sqlite3 -init database/place-genie.sql database/place-genie.db ".read database/populate.sql"


