DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS city;
DROP TABLE IF EXISTS reservation;


CREATE TABLE user (
    id              INTEGER PRIMARY KEY,
    username        VARCHAR NOT NULL UNIQUE,
    password        VARCHAR NOT NULL ON CONFLICT ABORT
);

CREATE TABLE property (
    id                    INTEGER PRIMARY KEY,
    title                 VARCHAR NOT NULL,
    price                 REAL NOT NULL ON CONFLICT ABORT,
    city                  VARCHAR NOT NULL ON CONFLICT ABORT,  
    address               VARCHAR NOT NULL ON CONFLICT ABORT,            
    description           VARCHAR,
    capacity              INTEGER NOT NULL,
    owner_id              INTEGER REFERENCES user(id) ON DELETE CASCADE,

    CHECK(capacity >= 1 AND price >= 0)
);


CREATE TABLE reservation (
    id                    INTEGER PRIMARY KEY,
    property_id           INTEGER REFERENCES property(id),
    tourist_id            INTEGER REFERENCES user(id) ON DELETE CASCADE,
    arrival_date          DATE NOT NULL ON CONFLICT ABORT,
    departure_date        DATE NOT NULL ON CONFLICT ABORT,

    CHECK(departure_date > arrival_date)
);

/* populate tables to test SEARCH feature*/
INSERT INTO user VALUES (1, 'vitorhugo5', 'ltw1234');
INSERT INTO user VALUES (2, 'bernardosantos', '1234esof');
INSERT INTO user VALUES (3, 'margaridacosme', 'rcom6784');
INSERT INTO user VALUES (4, 'speedgonzalez', 'ltw_ez');

-- inserting values into property table
INSERT INTO property VALUES (1, 'T2 no Porto', 245, 'porto','travessa nova do covelo nº27', 'T3 com vista para o rio Douro. Remodelado em 2017.', 5, 1);
INSERT INTO property VALUES (2, 'T0 em Lisboa', 305, 'lisboa','rua do paraios nº34', 'T0 no centro de Lisboa, perto de várias atrações turisticas.', 2, 2);
INSERT INTO property VALUES (3, 'T1 em Vilamoura', 189, 'vilamoura','rua do lago nº23', 'Melhor lugar para passar férias em Vilamoura. Perto da praia e de clubes noturnos.', 3, 3);



-- inserting values into reservation table
INSERT INTO reservation VALUES (1, 3, 4, '2019-11-04', '2019-11-11');
INSERT INTO reservation VALUES (2, 1, 3, '2020-04-01', '2020-04-10');