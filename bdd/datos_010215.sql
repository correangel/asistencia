--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.14
-- Dumped by pg_dump version 9.1.14
-- Started on 2015-02-01 22:29:35 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- TOC entry 1926 (class 0 OID 35482)
-- Dependencies: 162 1941
-- Data for Name: personal; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO personal VALUES (29, '12345678', 'JUAN', 'PEREZ', 'jperez@hotmail.com', 'ESTADAL', '04161234578', 'ADMINISTRATIVO', 'TITULAR');
INSERT INTO personal VALUES (30, '12345679', 'CARMEN', 'LARA', 'clara@hotmail.com', 'NACIONAL', '04247854565', 'DOCENTE', 'TITULAR');
INSERT INTO personal VALUES (31, '12345666', 'CARLOS', 'LOPEZ', 'clopez@hotmail.com', 'ALCALDIA', '04124567896', 'ADMINISTRATIVO', 'INTERINO');


--
-- TOC entry 1940 (class 0 OID 35676)
-- Dependencies: 176 1926 1941
-- Data for Name: asistencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO asistencia VALUES (7, 31, '10:05:40-04:30', '2015-02-01');


--
-- TOC entry 1945 (class 0 OID 0)
-- Dependencies: 175
-- Name: asistencia_idasis_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('asistencia_idasis_seq', 7, true);


--
-- TOC entry 1934 (class 0 OID 35540)
-- Dependencies: 170 1941
-- Data for Name: diasfestivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO diasfestivo VALUES (9, '2015-02-16', 'CARNAVAL 1');
INSERT INTO diasfestivo VALUES (10, '2015-02-17', 'CARNAVAL 2');
INSERT INTO diasfestivo VALUES (11, '2015-02-03', 'NATALICION DE ANTONIO JOSE DE SUCRE');
INSERT INTO diasfestivo VALUES (12, '2015-05-01', 'DIA DEL TRABAJADOR');


--
-- TOC entry 1946 (class 0 OID 0)
-- Dependencies: 169
-- Name: diasfestivo_idfestivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('diasfestivo_idfestivo_seq', 12, true);


--
-- TOC entry 1928 (class 0 OID 35490)
-- Dependencies: 164 1941
-- Data for Name: horario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO horario VALUES (10, '07:00:00', '12:00:00', 'ADMINISTRATIVO');
INSERT INTO horario VALUES (11, '07:00:00', '12:30:00', 'DOCENTE');
INSERT INTO horario VALUES (12, '07:00:00', '18:00:00', 'VIGILANTE 1');


--
-- TOC entry 1947 (class 0 OID 0)
-- Dependencies: 163
-- Name: horario_idhor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horario_idhor_seq', 12, true);


--
-- TOC entry 1936 (class 0 OID 35551)
-- Dependencies: 172 1928 1926 1941
-- Data for Name: horario_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO horario_persona VALUES (20, 30, 11);
INSERT INTO horario_persona VALUES (21, 31, 10);


--
-- TOC entry 1948 (class 0 OID 0)
-- Dependencies: 171
-- Name: horario_persona_idhorper_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horario_persona_idhorper_seq', 21, true);


--
-- TOC entry 1930 (class 0 OID 35514)
-- Dependencies: 166 1941
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO permiso VALUES (1, 'Permiso Medico (PM)');
INSERT INTO permiso VALUES (2, 'Permiso Injustificado (PI)');


--
-- TOC entry 1949 (class 0 OID 0)
-- Dependencies: 165
-- Name: permiso_idper_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permiso_idper_seq', 1, false);


--
-- TOC entry 1932 (class 0 OID 35522)
-- Dependencies: 168 1930 1926 1941
-- Data for Name: permiso_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO permiso_persona VALUES (10, 29, '2015-02-01', '2015-02-01', 'permiso prueba', 1);


--
-- TOC entry 1950 (class 0 OID 0)
-- Dependencies: 167
-- Name: permiso_persona_idperper_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permiso_persona_idperper_seq', 10, true);


--
-- TOC entry 1951 (class 0 OID 0)
-- Dependencies: 161
-- Name: personal_idper_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('personal_idper_seq', 31, true);


--
-- TOC entry 1938 (class 0 OID 35586)
-- Dependencies: 174 1926 1941
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario VALUES (3, 'JPEREZ', '$2a$08$664l/.zpH7L/h32NxXod6OtjRjO9YiDZPoUKA7ICuFPsyI8CEpAo.', 'ADMINISTRADOR', '2015-01-31 21:01:21', 'ACTIVO', 29);
INSERT INTO usuario VALUES (10, 'CLARA', '$2a$08$3FGNE37XV45BbuUsyhKV8OTjY0SRffBF27aSDcxm.lmLDpeDHDoIi', 'ADMINISTRADOR', '2015-02-01 10:02:15', 'ACTIVO', 30);
INSERT INTO usuario VALUES (11, 'CLOPEZ', '$2a$08$Q0uoxvg3slJ90ZCH8kMEx.q85aXWSBN1KioLvp3h6QEa3r.StW98q', 'OPERADOR', '2015-02-01 20:02:42', 'ACTIVO', 31);


--
-- TOC entry 1952 (class 0 OID 0)
-- Dependencies: 173
-- Name: usuario_idusuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_idusuario_seq', 11, true);


-- Completed on 2015-02-01 22:29:35 VET

--
-- PostgreSQL database dump complete
--
