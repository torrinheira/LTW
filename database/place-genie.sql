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


-----------------------
-- POPULATE DATABASE --
-----------------------
PRAGMA foreign_keys = on;


-- password     bernas123
INSERT INTO user VALUES (1, 'bernas', 'bernardosantos@mail.com', '$2y$10$ikv4NjBnEAAgt1HKiKd4nupczXAFX8ufBMTaWDOzL58PderbTP6l6', 'Bernardo', 'Santos', NULL, NULL);
-- password     p4ssw0rd
INSERT INTO user VALUES (2, 'vitor', 'turrinheira@fafense.com', '$2y$10$dsxoJhvABopd/5G3KY0lkezajUyaGwR5Fdj60jxMyNDJGmKnNdB7G', 'Vítor', 'Hugo', NULL, NULL);
-- password     rcom6784
INSERT INTO user VALUES (3, 'margaridacosme', 'mcosme@gmail.com', '$2y$10$FPDF42/Mp/MBf.WLAXXuyuY2QbNf0rr1M.N/hb.QSM4er28YDcRca', 'Margarida', 'Cosme', NULL, NULL);


INSERT INTO property VALUES (1, 'T2 no Porto', 245, 'porto','travessa nova do covelo nº27', 'T2 com vista para o rio Douro. Remodelado em 2017.', 5, 1);
INSERT INTO property VALUES (2, 'T0 em Lisboa', 305, 'lisboa','rua do paraios nº34', 'T0 no centro de Lisboa, perto de várias atrações turisticas.', 2, 2);
INSERT INTO property VALUES (3, 'T1 em Vilamoura', 189, 'vilamoura','rua do lago nº23', 'Melhor lugar para passar férias em Vilamoura. Perto da praia e de clubes noturnos.', 3, 3);
INSERT INTO property VALUES (4, 'T3 junto ao aeroporto', 285, 'aeroporto','rua sa carneiro', 'T3 com vista para o aeroporto.Bom isolamento.', 5, 2);
INSERT INTO property VALUES (5, 'T4 no Porto', 345, 'portolandia','travessa 1000 sóis.', 'Tudo o que precisa pode encontrar aqui.', 5, 1);
INSERT INTO property VALUES (6, 'T1 no Porto', 145, 'portalegre','rua doutor roberto frias', 'T1 em frente à FEUP. Remodelado em 2018.', 5, 4);
INSERT INTO property VALUES (7, 'T2 no Porto', 205, 'minasporto','circunvalção porto nº213', 'T2 junto à circunvalação, perto da pizzaria Dominos.', 5, 3);


INSERT INTO reservation VALUES (1, 3, 4, '2019-11-04', '2019-11-11');
INSERT INTO reservation VALUES (2, 1, 3, '2020-04-01', '2020-04-10');
