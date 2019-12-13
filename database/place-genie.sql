DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS city;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS image;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS property_image;


CREATE TABLE user (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR NOT NULL UNIQUE,
    email           VARCHAR NOT NULL UNIQUE,
    password        VARCHAR NOT NULL ON CONFLICT ABORT,
    first_name      VARCHAR NOT NULL,
    last_name       VARCHAR NOT NULL,
    image           INTEGER REFERENCES image(id),
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
    owner           VARCHAR REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE,

    -- TODO: capacity needs to have a limit
    CHECK(capacity >= 1 AND price >= 0)
);


CREATE TABLE reservation (
    id                  INTEGER PRIMARY KEY,
    property_id         INTEGER REFERENCES property(id) ON DELETE CASCADE,
    tourist             VARCHAR REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE,
    arrival_date        DATE NOT NULL ON CONFLICT ABORT,
    departure_date      DATE NOT NULL ON CONFLICT ABORT,

    CHECK(departure_date > arrival_date)
);


CREATE TABLE image (
    id                  INTEGER PRIMARY KEY,
    description         VARCHAR
);


CREATE TABLE comment (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE,
    property_id     INTEGER REFERENCES property(id) ON DELETE CASCADE,
    date            DATE NOT NULL,
    content         VARCHAR NOT NULL
);


CREATE TABLE property_image (
    image_id        INTEGER UNIQUE REFERENCES image(id) ON DELETE CASCADE,
    property_id     INTEGER REFERENCES property(id) ON DELETE CASCADE
);
