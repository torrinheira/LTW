DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS city;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS image;


CREATE TABLE user (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR NOT NULL UNIQUE,
    email           VARCHAR NOT NULL UNIQUE,
    password        VARCHAR NOT NULL ON CONFLICT ABORT,
    first_name      VARCHAR NOT NULL,
    last_name       VARCHAR NOT NULL,
    image_id        INTEGER REFERENCES image(id),
    description     VARCHAR
);

CREATE TABLE property (
    id              INTEGER PRIMARY KEY,
    title           VARCHAR NOT NULL,
    price           REAL NOT NULL ON CONFLICT ABORT,
    city            VARCHAR NOT NULL ON CONFLICT ABORT,  
    address         VARCHAR NOT NULL ON CONFLICT ABORT,            
    description     VARCHAR,
    capacity        INTEGER NOT NULL,
    owner_id        INTEGER REFERENCES user(id) ON DELETE CASCADE,

    CHECK(capacity >= 1 AND price >= 0)
);


CREATE TABLE reservation (
    id                  INTEGER PRIMARY KEY,
    property_id         INTEGER REFERENCES property(id),
    tourist_id          INTEGER REFERENCES user(id) ON DELETE CASCADE,
    arrival_date        DATE NOT NULL ON CONFLICT ABORT,
    departure_date      DATE NOT NULL ON CONFLICT ABORT,

    CHECK(departure_date > arrival_date)
);


CREATE TABLE image (
    id                  INTEGER PRIMARY KEY,
    description         VARCHAR NOT NULL
);