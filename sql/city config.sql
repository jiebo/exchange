DROP TABLE config_city;

CREATE TABLE config_city (
    city_name VARCHAR(16) CHARACTER SET utf8,
    days NUMERIC(2, 1),
    nights NUMERIC(2, 1),
    currency CHAR(3) CHARACTER SET utf8
);
INSERT INTO config_city VALUES ('Iceland',3.5,4,'ISK');
INSERT INTO config_city VALUES ('London',5.5,4,'GBP');
INSERT INTO config_city VALUES ('Barcelona',3,3,'EUR');
INSERT INTO config_city VALUES ('Madrid',2,3,'EUR');
INSERT INTO config_city VALUES ('Amsterdam',2,1,'EUR');
INSERT INTO config_city VALUES ('Brussels',1.5,2,'EUR');
INSERT INTO config_city VALUES ('Warsaw',2,2,'PLN');
INSERT INTO config_city VALUES ('Krakow',3,2,'PLN');
INSERT INTO config_city VALUES ('Vienna',3,2,'EUR');
INSERT INTO config_city VALUES ('Budapest',3,3,'HUF');
INSERT INTO config_city VALUES ('Copenhagen',1.5,1,'DKK');
INSERT INTO config_city VALUES ('Milan',3,3,'EUR');
INSERT INTO config_city VALUES ('Florence',3,2,'EUR');
INSERT INTO config_city VALUES ('Rome',2,3,'EUR');
INSERT INTO config_city VALUES ('Athens',3,3,'EUR');
INSERT INTO config_city VALUES ('Santorini',2,2,'EUR');
INSERT INTO config_city VALUES ('Istanbul',3,3,'TRY');
INSERT INTO config_city VALUES ('Edinburgh',1.5,1,'GBP');
INSERT INTO config_city VALUES ('Berlin',3,3,'EUR');
INSERT INTO config_city VALUES ('Prague',2,3,'CZK');
INSERT INTO config_city VALUES ('Paris',2.5,3,'EUR');
