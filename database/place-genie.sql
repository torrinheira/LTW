CREATE TABLE user (
    username        VARCHAR PRIMARY KEY,
    password        VARCHAR NOT NULL
);

CREATE TABLE property (
    id              INTEGER PRIMARY KEY,
    title           VARCHAR,
    price           REAL,
    location_id     INTEGER REFERENCES location(id),
    description     VARCHAR,
    capacity        INTEGER,
    owner           VARCHAR REFERENCES user(username)
);

CREATE TABLE location (
    id              INTEGER PRIMARY KEY,
    latitude        REAL,
    longitude       REAL
);

CREATE TABLE reservation (
    id              INTEGER PRIMARY KEY,
    property_id     INTEGER REFERENCES property(id),
    tourist         VARCHAR REFERENCES user(username),
    arrival_date    DATE,
    departure_date  DATE
);