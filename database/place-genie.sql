DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS city;
DROP TABLE IF EXISTS reservation;


CREATE TABLE user (
    username        VARCHAR PRIMARY KEY,
    password        VARCHAR NOT NULL ON CONFLICT ABORT
);

CREATE TABLE property (
    id                    INTEGER PRIMARY KEY,
    title                 VARCHAR,
    price                 REAL NOT NULL ON CONFLICT ABORT,
    city_id               INTEGER REFERENCES city(id),
    description           VARCHAR,
    capacity              INTEGER,
    owner_username        INTEGER REFERENCES user(username) ON DELETE CASCADE
);

CREATE TABLE city (
    id              INTEGER PRIMARY KEY,
    name            VARCHAR NOT NULL UNIQUE
);

CREATE TABLE reservation (
    id                    INTEGER PRIMARY KEY,
    property_id           INTEGER REFERENCES property(id),
    tourist_username      INTEGER REFERENCES user(username) ON DELETE CASCADE,
    arrival_date          DATE NOT NULL ON CONFLICT ABORT,
    departure_date        DATE NOT NULL ON CONFLICT ABORT
);