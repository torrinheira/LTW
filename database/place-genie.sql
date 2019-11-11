DROP IF EXISTS user;
DROP IF EXISTS property;
DROP IF EXISTS location;
DROP IF EXISTS reservation;


CREATE TABLE user (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR UNIQUE NOT NULL ON CONFLICT ABORT,
    password        VARCHAR NOT NULL ON CONFLICT ABORT
);

CREATE TABLE property (
    id              INTEGER PRIMARY KEY,
    title           VARCHAR,
    price           REAL NOT NULL ON CONFLICT ABORT,
    city_id         INTEGER REFERENCES city(id),
    description     VARCHAR,
    capacity        INTEGER,
    owner_id        INTEGER REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE city (
    id              INTEGER PRIMARY KEY,
    name            VARCHAR NOT NULL UNIQUE
);

CREATE TABLE reservation (
    id              INTEGER PRIMARY KEY,
    property_id     INTEGER REFERENCES property(id),
    tourist_id      INTEGER REFERENCES user(id) ON DELETE CASCADE,
    arrival_date    DATE NOT NULL ON CONFLICT ABORT,
    departure_date  DATE NOT NULL ON CONFLICT ABORT
);