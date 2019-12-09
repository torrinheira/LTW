-----------------------
-- POPULATE DATABASE --
-----------------------
PRAGMA foreign_keys = on;


-- insert the default profile picture
INSERT INTO image VALUES (1, 'default profile picture');


-- insert users
-- password     bernas123
INSERT INTO user VALUES ('bernas', 'bernardosantos@mail.com', '$2y$10$ikv4NjBnEAAgt1HKiKd4nupczXAFX8ufBMTaWDOzL58PderbTP6l6', 'Bernardo', 'Santos', 1, NULL);
-- password     p4ssw0rd
INSERT INTO user VALUES ('vitor', 'turrinheira@fafense.com', '$2y$10$dsxoJhvABopd/5G3KY0lkezajUyaGwR5Fdj60jxMyNDJGmKnNdB7G', 'Vítor', 'Hugo', 1, 'LTW é a minha cadeira preferida! ;)');
-- password     rcom6784
INSERT INTO user VALUES ('margaridacosme', 'mcosme@gmail.com', '$2y$10$FPDF42/Mp/MBf.WLAXXuyuY2QbNf0rr1M.N/hb.QSM4er28YDcRca', 'Margarida', 'Cosme', 1, NULL);


-- insert properties
INSERT INTO property VALUES (1, 'T2 no Porto', 245, 'porto','travessa nova do covelo nº27', 'T2 com vista para o rio Douro. Remodelado em 2017.', 5, 'bernas');
INSERT INTO property VALUES (2, 'T0 em Lisboa', 305, 'lisboa','rua do paraios nº34', 'T0 no centro de Lisboa, perto de várias atrações turisticas.', 2, 'vitor');
INSERT INTO property VALUES (3, 'T1 em Vilamoura', 189, 'vilamoura','rua do lago nº23', 'Melhor lugar para passar férias em Vilamoura. Perto da praia e de clubes noturnos.', 3, 'margaridacosme');
INSERT INTO property VALUES (4, 'T3 junto ao aeroporto', 285, 'aeroporto','rua sa carneiro', 'T3 com vista para o aeroporto.Bom isolamento.', 5, 'vitor');
INSERT INTO property VALUES (5, 'T4 no Porto', 345, 'portolandia','travessa 1000 sóis.', 'Tudo o que precisa pode encontrar aqui.', 5, 'bernas');
INSERT INTO property VALUES (6, 'T1 no Porto', 145, 'portalegre','rua doutor roberto frias', 'T1 em frente à FEUP. Remodelado em 2018.', 5, 'margaridacosme');
INSERT INTO property VALUES (7, 'T2 no Porto', 205, 'minasporto','circunvalção porto nº213', 'T2 junto à circunvalação, perto da pizzaria Dominos.', 5, 'bernas');


-- insert comments
INSERT INTO comment VALUES(1, 'vitor', 1, '2019-12-10', 'Epah está um bocado podre :/');
INSERT INTO comment VALUES(2, 'bernas', 1, '2019-12-10', 'Tchee grande cena bro, curti milhões :)');
INSERT INTO comment VALUES(3, 'margaridacosme', 1, '2019-12-10', 'Vista muito boa!');


-- insert reservations
INSERT INTO reservation VALUES(1, 3, 'bernas', '2019-11-20', '2019-11-21');
INSERT INTO reservation VALUES(2, 1, 'vitor', '2020-04-01', '2020-04-10');
INSERT INTO reservation VALUES(3, 3, 'margaridacosme', '2019-11-04', '2019-11-11');
