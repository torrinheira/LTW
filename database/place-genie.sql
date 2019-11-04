DROP IF EXISTS user;
DROP IF EXISTS property;
DROP IF EXISTS location;
DROP IF EXISTS reservation;


CREATE TABLE user (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR UNIQUE NOT NULL,
    password        VARCHAR NOT NULL
);

CREATE TABLE property (
    id              INTEGER PRIMARY KEY,
    title           VARCHAR,
    price           REAL,
    location_id     INTEGER REFERENCES location(id),
    description     VARCHAR,
    capacity        INTEGER,
    owner_id        INTEGER REFERENCES user(id)
);

CREATE TABLE location (
    id              INTEGER PRIMARY KEY,
    latitude        REAL,
    longitude       REAL
);

CREATE TABLE reservation (
    id              INTEGER PRIMARY KEY,
    property_id     INTEGER REFERENCES property(id),
    tourist_id      INTEGER REFERENCES user(id),
    arrival_date    DATE,
    departure_date  DATE
);