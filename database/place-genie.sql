DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS city;
DROP TABLE IF EXISTS reservation;


CREATE TABLE user (
    username        VARCHAR PRIMARY KEY,
    password        VARCHAR NOT NULL ON CONFLICT ABORT
);

CREATE TABLE property (
    id                    INTEGER PRIMARY KEY AUTOINCREMENT,
    title                 VARCHAR,
    price                 REAL NOT NULL ON CONFLICT ABORT,
    city                  VARCHAR NOT NULL ON CONFLICT ABORT,  
    address               VARCHAR NOT NULL ON CONFLICT ABORT,            
    description           VARCHAR,
    capacity              INTEGER,
    owner_username        VARCHAR REFERENCES user(username) ON DELETE CASCADE
);


CREATE TABLE reservation (
    id                    INTEGER PRIMARY KEY AUTOINCREMENT,
    property_id           INTEGER REFERENCES property(id),
    tourist_username      VARCHAR REFERENCES user(username) ON DELETE CASCADE,
    arrival_date          DATE NOT NULL ON CONFLICT ABORT,
    departure_date        DATE NOT NULL ON CONFLICT ABORT
);


/*
CREATE TABLE city (
    id              INTEGER PRIMARY KEY,
    name            VARCHAR NOT NULL UNIQUE
);
*/