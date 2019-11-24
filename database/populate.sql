PRAGMA foreign_keys = on;

-- inserting values into user table
INSERT INTO user VALUES ('vitorhugo5', 'ltw1234');
INSERT INTO user VALUES ('bernardosantos', '1234esof');
INSERT INTO user VALUES ('margaridacosme', 'rcom6784');
INSERT INTO user VALUES ('speedgonzalez', 'ltw_ez');

-- inserting values into property table
INSERT INTO property VALUES (1, 'T2 no Porto', 245, 1, 'T3 com vista para o rio Douro. Remodelado em 2017.', 5, 'vitorhugo5');
INSERT INTO property VALUES (2, 'T0 em Lisboa', 305, 2, 'T0 no centro de Lisboa, perto de várias atrações turisticas.', 2, 'bernardosantos');
INSERT INTO property VALUES (3, 'T1 em Vilamoura', 189, 3, 'Melhor lugar para passar férias em Vilamoura. Perto da praia e de clubes noturnos.', 3, 'margaridacosme');

-- inserting values into location table
INSERT INTO city VALUES (1, 'Porto');
INSERT INTO city VALUES (2, 'Lisboa');
INSERT INTO city VALUES (3, 'Madrid');

-- inserting values into reservation table
INSERT INTO reservation VALUES (1, 3, 'speedgonzalez', '2019-11-04', '2019-11-11');
INSERT INTO reservation VALUES (2, 1, 'margaridacosme', '2020-04-01', '2020-04-10');


