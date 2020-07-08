--
-- PostgreSQL database dump
--

-- Dumped from database version 10.12 (Ubuntu 10.12-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.12 (Ubuntu 10.12-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: ciudades; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.ciudades (
    cid integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE public.ciudades OWNER TO grupo77;

--
-- Name: compra_ticket; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.compra_ticket (
    tid integer NOT NULL,
    uid integer,
    fechacompra date
);


ALTER TABLE public.compra_ticket OWNER TO grupo77;

--
-- Name: contactos_paises; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.contactos_paises (
    cpid integer NOT NULL,
    contacto character varying(255)
);


ALTER TABLE public.contactos_paises OWNER TO grupo77;

--
-- Name: datos_usuarios; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.datos_usuarios (
    duid integer NOT NULL,
    nombre character varying(255),
    direccionusuario character varying(255)
);


ALTER TABLE public.datos_usuarios OWNER TO grupo77;

--
-- Name: destino; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.destino (
    vid integer NOT NULL,
    cid integer
);


ALTER TABLE public.destino OWNER TO grupo77;

--
-- Name: en_hotel; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.en_hotel (
    rid integer NOT NULL,
    hid integer
);


ALTER TABLE public.en_hotel OWNER TO grupo77;

--
-- Name: esta_en; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.esta_en (
    hid integer NOT NULL,
    cid integer
);


ALTER TABLE public.esta_en OWNER TO grupo77;

--
-- Name: hace; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.hace (
    uid integer,
    rid integer NOT NULL
);


ALTER TABLE public.hace OWNER TO grupo77;

--
-- Name: hoteles; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.hoteles (
    hid integer NOT NULL,
    nombre character varying(255),
    direccionhotel character varying(255),
    telefono character varying(255),
    precionoche integer
);


ALTER TABLE public.hoteles OWNER TO grupo77;

--
-- Name: mail_usuarios; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.mail_usuarios (
    muid integer NOT NULL,
    mail character varying(255)
);


ALTER TABLE public.mail_usuarios OWNER TO grupo77;

--
-- Name: origen; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.origen (
    vid integer NOT NULL,
    cid integer
);


ALTER TABLE public.origen OWNER TO grupo77;

--
-- Name: paises; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.paises (
    pid integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE public.paises OWNER TO grupo77;

--
-- Name: para; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.para (
    tid integer NOT NULL,
    vid integer
);


ALTER TABLE public.para OWNER TO grupo77;

--
-- Name: pertenece_a; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.pertenece_a (
    cid integer NOT NULL,
    pid integer
);


ALTER TABLE public.pertenece_a OWNER TO grupo77;

--
-- Name: reservas; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.reservas (
    rid integer NOT NULL,
    checkin date,
    chekout date
);


ALTER TABLE public.reservas OWNER TO grupo77;

--
-- Name: tickets; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.tickets (
    tid integer NOT NULL,
    asiento integer,
    fechaviaje date
);


ALTER TABLE public.tickets OWNER TO grupo77;

--
-- Name: tiene_contacto; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.tiene_contacto (
    pid integer,
    cpid integer NOT NULL
);


ALTER TABLE public.tiene_contacto OWNER TO grupo77;

--
-- Name: tiene_datos; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.tiene_datos (
    duid integer NOT NULL,
    uid integer
);


ALTER TABLE public.tiene_datos OWNER TO grupo77;

--
-- Name: tiene_mail; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.tiene_mail (
    muid integer NOT NULL,
    uid integer
);


ALTER TABLE public.tiene_mail OWNER TO grupo77;

--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.usuarios (
    uid integer NOT NULL,
    username character varying(255)
);


ALTER TABLE public.usuarios OWNER TO grupo77;

--
-- Name: viajes; Type: TABLE; Schema: public; Owner: grupo77
--

CREATE TABLE public.viajes (
    vid integer NOT NULL,
    horasalida time without time zone,
    duracion integer,
    transporte character varying(255),
    capacidad integer,
    precio integer
);


ALTER TABLE public.viajes OWNER TO grupo77;

--
-- Data for Name: ciudades; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.ciudades (cid, nombre) FROM stdin;
1	Roma
2	Florencia
3	París
4	Chantilly
5	Nancy
6	Bruselas
7	Antwerp
8	Dresde
9	Westminster
10	Milán
\.


--
-- Data for Name: compra_ticket; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.compra_ticket (tid, uid, fechacompra) FROM stdin;
1	1	2020-03-02
2	1	2019-11-04
3	2	2018-12-23
4	2	2019-11-09
5	2	2020-01-20
6	2	2018-09-04
7	3	2020-08-05
8	3	2019-01-09
9	3	2020-12-19
10	3	2018-02-09
11	3	2018-05-22
12	4	2019-11-08
13	4	2018-05-04
14	4	2020-12-07
15	4	2019-03-11
16	5	2020-05-16
17	5	2018-06-09
18	5	2019-03-24
19	5	2019-09-18
20	6	2019-02-17
21	6	2020-02-27
22	6	2019-07-11
23	6	2020-02-28
24	7	2020-08-12
25	8	2020-05-11
26	8	2018-12-13
27	8	2018-11-05
28	8	2020-04-01
29	8	2020-12-22
30	9	2019-02-04
31	9	2018-07-01
32	9	2020-07-10
33	9	2020-10-08
34	9	2018-08-15
35	9	2019-02-18
36	10	2020-02-10
37	10	2018-08-15
38	10	2018-11-20
39	11	2020-05-20
40	11	2018-01-12
41	11	2020-05-08
42	11	2018-07-09
43	11	2018-10-19
44	11	2019-04-15
45	12	2019-01-26
46	12	2020-08-14
47	13	2019-09-04
48	13	2018-03-12
49	13	2019-12-12
50	13	2019-07-18
51	13	2020-02-27
52	13	2018-07-10
53	14	2018-05-10
54	15	2020-10-16
55	15	2020-10-15
56	15	2018-03-05
57	16	2019-07-22
58	16	2020-08-22
59	16	2018-05-05
60	16	2020-02-10
61	17	2019-08-25
62	17	2019-12-10
63	18	2020-09-25
64	18	2020-06-11
65	18	2020-09-08
66	18	2020-10-16
67	19	2019-09-26
68	19	2020-10-18
69	19	2020-03-18
70	20	2018-12-19
71	20	2018-10-14
72	20	2020-04-02
73	20	2019-05-22
74	20	2020-10-08
75	20	2020-02-14
76	20	2020-05-05
77	21	2019-03-19
78	21	2020-03-19
79	22	2019-05-06
80	22	2019-06-14
81	23	2018-12-22
82	23	2018-02-01
83	23	2018-12-27
84	23	2019-04-11
85	24	2018-08-05
86	24	2020-02-02
87	24	2019-03-01
88	25	2020-05-17
89	25	2019-10-04
90	25	2019-08-28
91	25	2020-09-18
92	26	2018-06-15
93	26	2019-04-23
94	26	2019-11-10
95	26	2019-12-18
96	26	2018-07-04
97	26	2019-02-17
98	27	2020-08-07
99	27	2019-08-24
100	27	2019-05-14
101	28	2019-02-09
102	28	2019-06-22
103	28	2019-09-14
104	28	2020-09-18
105	29	2019-06-11
106	29	2018-04-15
107	29	2018-03-11
108	29	2018-12-25
109	30	2019-06-08
110	30	2019-05-16
111	30	2019-04-06
112	30	2020-02-22
113	30	2018-03-06
114	31	2018-03-25
115	31	2020-07-17
116	31	2018-09-11
117	31	2018-06-25
118	32	2019-02-12
119	32	2020-04-16
120	32	2019-01-22
121	32	2018-09-21
122	32	2018-09-10
123	33	2019-02-28
124	33	2018-04-08
125	34	2018-06-12
126	34	2018-12-01
127	34	2020-02-20
128	34	2020-03-17
129	35	2019-12-10
130	35	2019-07-18
131	35	2019-01-03
132	36	2018-06-10
133	36	2020-09-04
134	36	2018-05-19
135	37	2020-10-12
136	37	2019-09-26
137	38	2018-12-21
138	38	2020-02-25
139	38	2019-07-11
140	38	2018-01-06
141	38	2019-01-01
142	39	2018-10-05
143	39	2019-12-02
144	40	2019-09-13
145	40	2018-05-06
146	40	2018-04-26
147	40	2018-12-13
148	41	2018-07-17
149	41	2018-01-28
150	41	2019-06-08
151	42	2019-11-14
152	42	2019-09-10
153	42	2019-07-06
154	42	2020-07-04
155	42	2018-01-15
156	42	2018-01-22
157	42	2019-06-21
158	42	2019-01-04
159	42	2020-04-12
160	43	2020-11-10
161	43	2020-07-17
162	43	2018-10-23
163	43	2019-03-20
164	43	2020-09-12
165	44	2018-08-24
166	44	2019-07-19
167	44	2020-04-04
168	44	2018-01-18
169	44	2018-01-24
170	44	2020-10-15
171	44	2019-11-25
172	44	2020-09-15
173	45	2020-03-07
174	45	2019-02-05
175	45	2020-12-13
176	45	2018-03-25
177	46	2020-04-28
178	46	2019-12-23
179	46	2020-06-24
180	46	2019-03-19
181	47	2019-01-13
182	47	2019-07-27
183	47	2019-12-21
184	47	2019-01-01
185	48	2018-04-26
186	48	2018-10-21
187	48	2018-11-15
188	49	2020-03-17
189	49	2020-10-04
190	49	2020-05-26
191	49	2019-08-25
192	49	2020-07-23
193	49	2018-01-05
194	49	2018-11-21
195	50	2020-09-27
196	50	2020-06-11
197	50	2018-10-24
198	50	2019-07-23
199	50	2020-10-10
200	50	2018-07-28
\.


--
-- Data for Name: contactos_paises; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.contactos_paises (cpid, contacto) FROM stdin;
1	199-783-913
2	433-666-975
3	758-382-381
4	129-666-539
5	133-154-268
\.


--
-- Data for Name: datos_usuarios; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.datos_usuarios (duid, nombre, direccionusuario) FROM stdin;
1	David Randall	PSC 0949, Box 2041 APO AA 71725
2	Frances Henry	USNS Fitzpatrick FPO AP 74170
3	Courtney Garcia DDS	794 James Freeway Mathewsfurt, MI 18712
4	Jason Kemp	51005 Timothy Underpass Woodsburgh, VA 21674
5	Vernon Gonzales	8703 Amy Pike Garciachester, IA 27013
6	Lori Campos	429 Angela Pike Apt. 389 Port Wanda, OR 44178
7	Brian Duke	400 Thompson Springs Port Amyland, AR 65691
8	Jessica Graham	65431 Harris Plaza Apt. 658 Hillhaven, NV 54338
9	Marco Curtis	10221 Paula Highway Suite 342 Garrisonmouth, HI 48762
10	Oscar Caldwell	982 Andrew Underpass Suite 779 New Michaelshire, OH 97878
11	Dennis Rios	008 Rowland Plains Jacksonport, NH 34492
12	John Morrow	3115 Ronald Radial Suite 453 Carrfort, OK 90593
13	Mr. Stanley Davis	47013 Caldwell Parkway Apt. 925 Davidsonmouth, OK 87204
14	Miranda Schroeder	99833 Jason Unions Suite 828 Gabrielmouth, VT 17200
15	Phillip Hall	9349 Petersen Meadows Jonesland, WY 40858
16	Gregory Jones	715 John Falls Apt. 167 Alyssashire, KY 79697
17	Eric Marshall	7729 Bradford Springs Apt. 296 Christieland, AL 52634
18	Mark Dalton	876 Gabriel Plaza Port Brandonburgh, DC 44886
19	Jennifer Smith	783 Kimberly Court Apt. 695 East Sharon, TN 15847
20	Karen Conley	1364 Michael Hill Suite 750 Madisontown, CT 37329
21	George Stout	50663 Stacy Isle Georgefurt, PA 81787
22	Aaron Estrada	48764 Clark Ramp Bradfordmouth, UT 55780
23	Vincent Leonard	08849 Kevin Rapids New Baileytown, WY 45966
24	Darren Gray	95058 Powers Island Johnsonside, WA 89838
25	Nicholas Dunn	61079 Thomas Shore Gardnerton, IN 15710
26	Chad Holloway	075 Samantha Mews Jeremiahberg, MD 35545
27	Joshua Hansen	Unit 9153 Box 5256 DPO AA 17953
28	James Brooks	701 Tonya Hills Brittanyport, NJ 91013
29	Michael Hernandez	72374 Sandra Haven New Andrewstad, NV 94835
30	Emily Jackson	PSC 0039, Box 7414 APO AE 01858
31	Sheila Holmes	4518 Johnson Throughway Mayshaven, KS 69102
32	Christina Brown	145 Fisher Plain Port Phillipville, OH 56904
33	Shannon Tucker	2643 Brian Lakes Aguirrebury, CA 70775
34	Meredith Lindsey	0125 Pamela Roads Suite 573 Robertview, TN 81130
35	Sheila Hubbard	USNV Reyes FPO AE 86453
36	Debra Franklin	056 Richard Heights Suite 943 Port Kristibury, SD 75378
37	Matthew Randall	639 Theresa Causeway New Kimberly, OH 15747
38	Matthew Hardy	7653 Michelle Extensions Apt. 073 New Donald, AZ 84920
39	Jack Myers	3556 Tamara Road Apt. 376 North Maryshire, NC 83844
40	Samuel Sanders	6968 Harrison Meadows New Meganland, AL 47398
41	Sabrina Wang	2566 Emily Ports Suite 151 Jamesshire, LA 84360
42	Mrs. Jennifer Herrera	789 Cynthia Canyon Suite 606 Robintown, MA 16782
43	John Mitchell	7247 April Ville Suite 533 West Christinashire, NM 20136
44	Nicholas Howard	970 Patel Fort Callahanland, AZ 29356
45	Juan Hicks	80203 Walter Estates Suite 342 Port Dana, WA 52677
46	Miguel Santiago	Unit 8487 Box 8033 DPO AE 08178
47	Kenneth Miller	60602 Henderson Fords Apt. 764 North Frankhaven, HI 85863
48	Matthew Walker	9994 Denise Mills Suite 245 Samanthashire, ID 56928
49	Charles Esparza	0680 Adam Key South Chad, HI 15004
50	Justin Gonzalez	6493 Davis Walks Suite 766 New Robert, ME 32152
\.


--
-- Data for Name: destino; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.destino (vid, cid) FROM stdin;
1	8
2	3
3	4
4	4
5	3
6	6
7	8
8	1
9	3
10	6
11	2
12	3
13	6
14	5
15	10
16	2
17	3
18	3
19	5
20	2
21	3
22	6
23	1
24	6
25	4
26	9
27	10
28	7
29	10
30	9
31	2
32	3
33	2
34	7
35	10
36	6
37	2
38	6
39	6
40	2
41	2
42	6
43	4
44	3
45	5
46	3
47	7
48	4
49	8
50	1
51	6
52	1
53	6
54	6
55	8
56	6
57	10
58	6
59	5
60	9
61	3
62	3
63	1
64	10
65	3
66	8
67	2
68	9
69	2
70	6
71	3
72	6
73	8
74	3
75	3
76	4
77	1
78	4
79	4
80	10
81	3
82	9
83	6
84	7
85	2
86	1
\.


--
-- Data for Name: en_hotel; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.en_hotel (rid, hid) FROM stdin;
1	10
2	13
3	20
4	15
5	3
6	9
7	18
8	15
9	2
10	20
11	16
12	13
13	7
14	1
15	1
16	19
17	9
18	17
19	9
20	21
21	12
22	17
23	18
24	14
25	5
26	13
27	18
28	4
29	18
30	3
31	16
32	15
33	12
34	3
35	8
36	4
37	18
38	16
39	12
40	18
41	3
42	12
43	5
44	19
45	19
46	17
47	17
48	19
49	15
50	6
51	3
52	6
53	2
54	20
55	21
56	21
57	18
58	7
59	16
60	3
61	2
62	3
63	19
64	8
65	1
66	20
67	21
68	21
69	19
70	2
71	9
72	16
73	17
74	11
75	4
76	3
77	4
78	21
79	11
80	21
81	19
82	8
83	4
84	17
85	6
86	8
87	5
88	12
89	16
90	17
91	15
92	12
93	5
94	4
95	5
96	1
97	4
98	15
99	20
100	1
101	1
\.


--
-- Data for Name: esta_en; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.esta_en (hid, cid) FROM stdin;
8	2
2	1
1	1
13	3
19	8
15	5
10	2
16	6
17	6
7	2
4	1
3	1
12	3
11	3
9	2
5	1
21	1
18	7
6	1
20	9
14	4
\.


--
-- Data for Name: hace; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.hace (uid, rid) FROM stdin;
36	1
12	2
44	3
32	4
5	5
35	6
17	7
49	8
24	9
12	10
29	11
15	12
8	13
14	14
2	15
48	16
3	17
23	18
3	19
32	20
18	21
40	22
3	23
26	24
8	25
9	26
4	27
16	28
26	29
45	30
5	31
23	32
26	33
20	34
4	35
29	36
49	37
32	38
38	39
14	40
2	41
10	42
41	43
14	44
9	45
24	46
34	47
14	48
45	49
9	50
45	51
31	52
25	53
16	54
46	55
33	56
35	57
9	58
43	59
17	60
50	61
26	62
41	63
45	64
48	65
4	66
45	67
27	68
17	69
48	70
34	71
32	72
1	73
24	74
23	75
1	76
31	77
27	78
25	79
13	80
44	81
13	82
22	83
18	84
39	85
43	86
37	87
32	88
47	89
20	90
47	91
17	92
30	93
31	94
20	95
1	96
20	97
33	98
6	99
11	100
11	101
\.


--
-- Data for Name: hoteles; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.hoteles (hid, nombre, direccionhotel, telefono, precionoche) FROM stdin;
5	DomusAmor Navona	47081 Rosales Islands Suite 864 Port Sydney, UT 33108	998-171-811	18
19	B&B Hotel Dresden	703 Garcia Drive Suite 239 West Carolside, NV 09666	633-564-612	35
21	Hotel Rex Milano	71677 Theresa Fields Chadchester, TN 58947	527-989-688	21
7	Hotel delle Nazioni	511 Karen Neck Terriborough, WV 55292	321-718-523	28
18	PitufiHotel	PSC 3268, Box 6667 APO AE 63637	241-126-819	20
3	Domo Vaticano	7802 Scott Garden Apt. 827 Jerryport, WI 13545	647-252-126	30
15	Le cocon de Leon	8927 Hurst Harbor Apt. 156 Timothyfort, CA 72308	485-531-155	55
8	Hotel Alba Palace	8300 Kemp Gateway Suite 979 Blackhaven, WV 71663	745-819-474	25
4	Hotel Trastevere	Unit 5444 Box 3960 DPO AE 23180	738-387-267	22
11	Montparnasse	0943 Harmon Ways Collinsburgh, ME 20733	692-622-914	60
10	Hilton Florence Metropole	518 Hall Dam New Jesse, NM 01087	233-347-518	30
2	Palazzo Coliseo	8183 Michael Glen Apt. 437 Petersonland, VA 66579	771-764-467	43
14	Hyatt Regency Chantilly	9381 Melissa Walks Apt. 623 Port Barbarafurt, MI 38305	441-127-177	50
1	Hotel Roma	PSC 1716, Box 5186 APO AP 18920	294-527-692	35
12	Eiffel Hotel	PSC 4851, Box 9887 APO AP 86712	717-744-934	70
16	Royal Hotel	37962 Sanders Circles Apt. 357 Port Timothy, TN 24656	315-196-562	30
9	Hotel Jane	65223 Valdez Viaduct Lake Seanview, WY 97324	214-454-587	23
6	Roma Gondola	75237 Ross Radial Ashleeburgh, GA 15492	734-544-857	20
13	CitizenM Paris	833 Flores Key Suite 707 South Elizabethchester, IA 08393	799-491-215	50
20	The Sanctuary House Hotel	1281 Robert Mountain Schneidermouth, HI 23898	698-634-912	70
17	Hotel Phenix	Unit 6357 Box 9808 DPO AA 45781	282-833-326	38
\.


--
-- Data for Name: mail_usuarios; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.mail_usuarios (muid, mail) FROM stdin;
1	David.Randall@gmail.com
2	Frances.Henry@gmail.com
3	Courtney.Garcia@gmail.com
4	Jason.Kemp@gmail.com
5	Vernon.Gonzales@gmail.com
6	Lori.Campos@gmail.com
7	Brian.Duke@gmail.com
8	Jessica.Graham@gmail.com
9	Marco.Curtis@gmail.com
10	Oscar.Caldwell@gmail.com
11	Dennis.Rios@gmail.com
12	John.Morrow@gmail.com
13	Mr..Stanley@gmail.com
14	Miranda.Schroeder@gmail.com
15	Phillip.Hall@gmail.com
16	Gregory.Jones@gmail.com
17	Eric.Marshall@gmail.com
18	Mark.Dalton@gmail.com
19	Jennifer.Smith@gmail.com
20	Karen.Conley@gmail.com
21	George.Stout@gmail.com
22	Aaron.Estrada@gmail.com
23	Vincent.Leonard@gmail.com
24	Darren.Gray@gmail.com
25	Nicholas.Dunn@gmail.com
26	Chad.Holloway@gmail.com
27	Joshua.Hansen@gmail.com
28	James.Brooks@gmail.com
29	Michael.Hernandez@gmail.com
30	Emily.Jackson@gmail.com
31	Sheila.Holmes@gmail.com
32	Christina.Brown@gmail.com
33	Shannon.Tucker@gmail.com
34	Meredith.Lindsey@gmail.com
35	Sheila.Hubbard@gmail.com
36	Debra.Franklin@gmail.com
37	Matthew.Randall@gmail.com
38	Matthew.Hardy@gmail.com
39	Jack.Myers@gmail.com
40	Samuel.Sanders@gmail.com
41	Sabrina.Wang@gmail.com
42	Mrs..Jennifer@gmail.com
43	John.Mitchell@gmail.com
44	Nicholas.Howard@gmail.com
45	Juan.Hicks@gmail.com
46	Miguel.Santiago@gmail.com
47	Kenneth.Miller@gmail.com
48	Matthew.Walker@gmail.com
49	Charles.Esparza@gmail.com
50	Justin.Gonzalez@gmail.com
\.


--
-- Data for Name: origen; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.origen (vid, cid) FROM stdin;
1	10
2	6
3	5
4	5
5	4
6	3
7	6
8	2
9	4
10	7
11	10
12	1
13	3
14	4
15	2
16	3
17	6
18	4
19	4
20	3
21	4
22	9
23	2
24	3
25	3
26	6
27	8
28	6
29	2
30	6
31	3
32	6
33	10
34	6
35	8
36	9
37	10
38	7
39	7
40	1
41	1
42	8
43	5
44	1
45	4
46	6
47	6
48	5
49	6
50	2
51	3
52	3
53	3
54	8
55	6
56	8
57	2
58	9
59	4
60	6
61	6
62	1
63	3
64	2
65	6
66	10
67	1
68	6
69	1
70	9
71	2
72	7
73	10
74	2
75	6
76	3
77	3
78	3
79	3
80	8
81	2
82	6
83	3
84	6
85	10
86	2
\.


--
-- Data for Name: paises; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.paises (pid, nombre) FROM stdin;
1	Alemania
2	Italia
3	Bélgica
4	Inglaterra
5	Francia
\.


--
-- Data for Name: para; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.para (tid, vid) FROM stdin;
1	40
2	21
3	16
4	3
5	3
6	53
7	31
8	36
9	76
10	53
11	18
12	38
13	56
14	23
15	1
16	6
17	4
18	1
19	15
20	70
21	1
22	10
23	14
24	69
25	64
26	73
27	37
28	63
29	79
30	72
31	70
32	78
33	75
34	40
35	38
36	25
37	53
38	61
39	80
40	15
41	53
42	83
43	77
44	85
45	22
46	39
47	71
48	26
49	2
50	41
51	71
52	62
53	65
54	31
55	73
56	33
57	64
58	27
59	44
60	26
61	40
62	46
63	24
64	25
65	26
66	29
67	6
68	46
69	43
70	37
71	58
72	3
73	75
74	38
75	84
76	33
77	35
78	85
79	71
80	22
81	58
82	17
83	37
84	24
85	34
86	43
87	28
88	55
89	49
90	26
91	68
92	1
93	85
94	44
95	9
96	69
97	8
98	67
99	73
100	71
101	6
102	64
103	20
104	82
105	69
106	41
107	71
108	6
109	28
110	64
111	33
112	84
113	5
114	29
115	12
116	9
117	16
118	79
119	77
120	16
121	32
122	25
123	78
124	40
125	45
126	12
127	35
128	65
129	51
130	5
131	85
132	61
133	73
134	44
135	40
136	39
137	57
138	84
139	44
140	9
141	14
142	13
143	18
144	11
145	18
146	13
147	48
148	2
149	15
150	67
151	28
152	51
153	15
154	14
155	78
156	9
157	34
158	75
159	56
160	24
161	79
162	76
163	51
164	68
165	48
166	58
167	69
168	82
169	57
170	68
171	62
172	81
173	3
174	10
175	66
176	10
177	11
178	14
179	58
180	58
181	85
182	19
183	79
184	72
185	37
186	17
187	85
188	45
189	54
190	16
191	35
192	78
193	58
194	39
195	61
196	5
197	52
198	36
199	10
200	39
\.


--
-- Data for Name: pertenece_a; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.pertenece_a (cid, pid) FROM stdin;
1	2
2	2
3	5
4	5
5	5
6	3
7	3
8	1
9	4
10	2
\.


--
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.reservas (rid, checkin, chekout) FROM stdin;
1	2018-07-27	2018-07-28
2	2019-01-21	2019-01-27
3	2018-05-18	2018-05-25
4	2020-01-02	2020-01-12
5	2019-07-19	2019-07-21
6	2018-01-23	2018-02-04
7	2018-06-27	2018-07-10
8	2019-08-03	2019-08-17
9	2020-11-27	2020-11-28
10	2018-01-05	2018-01-15
11	2018-08-20	2018-08-22
12	2019-10-23	2019-11-01
13	2020-09-04	2020-09-15
14	2018-07-07	2018-07-21
15	2020-04-11	2020-04-20
16	2018-06-23	2018-07-01
17	2018-09-05	2018-09-09
18	2020-03-04	2020-03-17
19	2018-07-18	2018-07-24
20	2018-09-01	2018-09-10
21	2019-05-06	2019-05-13
22	2019-04-01	2019-04-12
23	2018-11-26	2018-12-07
24	2019-06-07	2019-06-12
25	2018-01-16	2018-01-22
26	2018-12-20	2018-12-28
27	2018-12-21	2018-12-31
28	2019-07-06	2019-07-13
29	2018-02-13	2018-02-14
30	2018-01-24	2018-02-02
31	2020-02-14	2020-02-16
32	2020-05-27	2020-06-06
33	2018-02-09	2018-02-20
34	2019-12-04	2019-12-18
35	2018-01-18	2018-01-21
36	2020-08-20	2020-08-27
37	2019-12-26	2020-01-07
38	2018-05-18	2018-05-22
39	2018-12-13	2018-12-24
40	2018-10-15	2018-10-20
41	2018-09-11	2018-09-16
42	2019-01-16	2019-01-28
43	2019-09-06	2019-09-07
44	2018-10-03	2018-10-15
45	2018-12-15	2018-12-21
46	2019-07-04	2019-07-15
47	2018-05-23	2018-06-05
48	2020-07-14	2020-07-15
49	2019-12-05	2019-12-19
50	2018-07-25	2018-08-02
51	2020-07-15	2020-07-22
52	2019-09-21	2019-09-22
53	2019-05-05	2019-05-10
54	2018-11-19	2018-11-29
55	2020-12-27	2021-01-07
56	2019-11-08	2019-11-16
57	2020-12-04	2020-12-17
58	2018-10-08	2018-10-11
59	2018-02-14	2018-02-18
60	2019-02-28	2019-03-06
61	2020-11-26	2020-12-03
62	2019-04-12	2019-04-25
63	2018-06-18	2018-06-21
64	2020-09-13	2020-09-21
65	2020-11-17	2020-11-30
66	2019-01-16	2019-01-24
67	2018-12-17	2018-12-21
68	2019-02-13	2019-02-25
69	2018-09-09	2018-09-20
70	2019-09-08	2019-09-15
71	2019-11-05	2019-11-07
72	2018-04-28	2018-04-30
73	2018-08-24	2018-08-26
74	2020-10-08	2020-10-17
75	2019-07-21	2019-07-30
76	2020-01-09	2020-01-11
77	2019-05-06	2019-05-18
78	2019-05-12	2019-05-15
79	2019-01-11	2019-01-22
80	2018-06-06	2018-06-18
81	2018-08-22	2018-08-26
82	2019-02-26	2019-03-05
83	2018-07-03	2018-07-17
84	2019-04-15	2019-04-21
85	2018-05-26	2018-05-31
86	2019-03-13	2019-03-27
87	2019-05-28	2019-06-10
88	2018-06-06	2018-06-07
89	2020-06-07	2020-06-17
90	2018-10-10	2018-10-17
91	2019-06-03	2019-06-06
92	2018-12-13	2018-12-24
93	2018-08-13	2018-08-15
94	2020-01-19	2020-01-20
95	2020-08-26	2020-08-28
96	2020-06-01	2020-06-09
97	2018-09-09	2018-09-11
98	2020-12-08	2020-12-19
99	2019-07-25	2019-08-08
100	2018-12-11	2018-12-17
101	2018-12-11	2018-12-17
\.


--
-- Data for Name: tickets; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.tickets (tid, asiento, fechaviaje) FROM stdin;
1	752	2020-10-28
2	325	2020-02-02
3	469	2019-04-22
4	16	2020-01-08
5	18	2020-02-19
6	96	2019-07-01
7	613	2021-05-02
8	137	2019-04-09
9	144	2021-03-19
10	141	2018-04-10
11	29	2018-11-18
12	708	2020-05-06
13	335	2018-12-30
14	284	2021-09-03
15	370	2019-08-08
16	75	2020-11-12
17	30	2019-02-04
18	601	2019-09-20
19	517	2020-07-14
20	84	2019-04-18
21	229	2020-09-24
22	555	2019-10-09
23	332	2020-10-25
24	32	2021-03-10
25	7	2020-08-09
26	130	2019-06-11
27	328	2019-02-03
28	81	2020-08-29
29	36	2021-09-18
30	23	2019-05-05
31	154	2019-02-26
32	175	2020-08-09
33	763	2021-07-05
34	535	2018-12-13
35	102	2019-12-15
36	41	2020-04-10
37	32	2019-05-12
38	221	2019-05-19
39	595	2020-10-17
40	125	2018-11-08
41	15	2020-06-07
42	108	2018-08-08
43	66	2019-08-15
44	23	2019-08-13
45	115	2019-07-25
46	21	2021-04-11
47	788	2019-12-03
48	155	2018-10-08
49	40	2020-08-08
50	10	2020-01-14
51	567	2020-06-26
52	153	2019-03-07
53	72	2018-11-06
54	249	2021-03-15
55	503	2021-07-12
56	35	2018-10-31
57	38	2020-02-17
58	648	2020-09-21
59	85	2018-12-31
60	23	2020-12-06
61	31	2020-03-22
62	28	2020-07-07
63	553	2021-06-22
64	33	2020-09-09
65	130	2020-10-08
66	12	2021-08-12
67	451	2020-06-22
68	4	2021-06-15
69	90	2020-09-14
70	465	2019-03-19
71	168	2019-01-12
72	40	2020-08-30
73	325	2019-08-20
74	269	2021-05-06
75	38	2020-09-11
76	42	2020-12-01
77	19	2019-12-14
78	43	2020-06-17
79	570	2019-06-05
80	62	2019-07-14
81	174	2019-01-21
82	5	2018-04-02
83	168	2019-08-24
84	437	2019-12-07
85	26	2019-03-03
86	27	2020-10-29
87	63	2019-12-26
88	303	2020-06-16
89	395	2020-01-02
90	21	2020-06-23
91	123	2021-06-15
92	506	2019-04-11
93	37	2019-07-22
94	33	2020-08-06
95	24	2020-01-17
96	22	2018-10-02
97	7	2019-05-18
98	703	2020-12-05
99	413	2020-01-21
100	71	2019-10-11
101	256	2019-04-10
102	16	2019-09-20
103	381	2019-11-13
104	58	2021-04-16
105	28	2020-04-06
106	43	2019-01-10
107	235	2018-11-06
108	387	2019-01-24
109	64	2020-04-03
110	41	2020-03-11
111	27	2019-07-05
112	22	2020-10-19
113	709	2018-12-31
114	16	2018-05-24
115	33	2020-12-14
116	20	2019-05-09
117	312	2018-09-23
118	34	2019-12-09
119	169	2021-01-11
120	729	2019-04-22
121	30	2019-05-19
122	27	2019-06-07
123	216	2019-03-30
124	288	2018-09-05
125	11	2018-12-09
126	94	2019-09-27
127	352	2020-03-21
128	101	2020-04-16
129	117	2020-10-05
130	369	2019-11-15
131	27	2019-08-31
132	655	2018-12-07
133	673	2021-06-01
134	28	2018-07-18
135	351	2021-05-10
136	38	2019-10-26
137	386	2019-10-17
138	25	2020-05-25
139	195	2020-03-07
140	8	2018-07-05
141	470	2019-05-31
142	39	2019-05-03
143	9	2020-04-30
144	575	2020-07-09
145	13	2018-06-05
146	90	2018-06-25
147	795	2019-06-11
148	512	2018-10-15
149	317	2018-04-28
150	422	2020-04-03
151	643	2020-04-12
152	786	2019-11-09
153	660	2019-12-03
154	244	2020-10-02
155	89	2018-06-14
156	29	2018-08-20
157	41	2019-08-20
158	651	2019-07-03
159	683	2020-08-10
160	165	2021-02-08
161	6	2020-10-15
162	417	2018-12-22
163	36	2019-12-15
164	145	2021-05-10
165	566	2019-05-21
166	44	2020-03-15
167	4	2020-06-03
168	79	2018-09-15
169	12	2018-04-24
170	188	2021-04-13
171	151	2020-01-24
172	775	2021-04-13
173	35	2020-08-04
174	273	2019-03-07
175	158	2021-10-09
176	84	2019-01-19
177	737	2020-06-27
178	278	2020-03-22
179	160	2020-10-22
180	60	2019-06-17
181	13	2019-08-11
182	5	2020-04-22
183	42	2020-06-18
184	17	2019-03-02
185	53	2019-01-21
186	109	2019-06-18
187	12	2019-01-14
188	10	2020-08-14
189	318	2021-01-02
190	385	2021-03-22
191	591	2020-05-21
192	519	2021-03-20
193	99	2018-05-05
194	9	2019-01-20
195	788	2021-07-24
196	147	2021-02-06
197	188	2018-12-23
198	58	2020-01-19
199	794	2020-11-09
200	3	2019-03-25
\.


--
-- Data for Name: tiene_contacto; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.tiene_contacto (pid, cpid) FROM stdin;
1	1
2	2
3	3
4	4
5	5
\.


--
-- Data for Name: tiene_datos; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.tiene_datos (duid, uid) FROM stdin;
1	45
2	34
3	31
4	40
5	15
6	28
7	26
8	36
9	42
10	44
11	43
12	22
13	33
14	19
15	3
16	8
17	47
18	5
19	41
20	9
21	39
22	49
23	17
24	32
25	24
26	2
27	18
28	35
29	27
30	4
31	30
32	1
33	37
34	14
35	29
36	38
37	10
38	21
39	16
40	46
41	13
42	12
43	6
44	7
45	50
46	25
47	48
48	11
49	23
50	20
\.


--
-- Data for Name: tiene_mail; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.tiene_mail (muid, uid) FROM stdin;
1	45
2	34
3	31
4	40
5	15
6	28
7	26
8	36
9	42
10	44
11	43
12	22
13	33
14	19
15	3
16	8
17	47
18	5
19	41
20	9
21	39
22	49
23	17
24	32
25	24
26	2
27	18
28	35
29	27
30	4
31	30
32	1
33	37
34	14
35	29
36	38
37	10
38	21
39	16
40	46
41	13
42	12
43	6
44	7
45	50
46	25
47	48
48	11
49	23
50	20
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.usuarios (uid, username) FROM stdin;
19	MirandaSchroeder
40	JasonKemp
17	VincentLeonard
1	ChristinaBrown
3	PhillipHall
48	KennethMiller
46	SamuelSanders
22	JohnMorrow
28	LoriCampos
29	SheilaHubbard
49	AaronEstrada
24	NicholasDunn
34	FrancesHenry
35	JamesBrooks
9	KarenConley
36	JessicaGraham
8	GregoryJones
44	OscarCaldwell
32	DarrenGray
30	SheilaHolmes
12	Mrs.Jennifer
2	ChadHolloway
21	MatthewHardy
50	JuanHicks
13	SabrinaWang
45	DavidRandall
42	MarcoCurtis
15	VernonGonzales
39	GeorgeStout
26	BrianDuke
11	MatthewWalker
6	JohnMitchell
31	CourtneyGarcia
33	Mr.Stanley
37	ShannonTucker
16	JackMyers
23	CharlesEsparza
5	MarkDalton
27	MichaelHernandez
41	JenniferSmith
25	MiguelSantiago
38	DebraFranklin
43	DennisRios
47	EricMarshall
18	JoshuaHansen
14	MeredithLindsey
7	NicholasHoward
20	JustinGonzalez
10	MatthewRandall
4	EmilyJackson
\.


--
-- Data for Name: viajes; Type: TABLE DATA; Schema: public; Owner: grupo77
--

COPY public.viajes (vid, horasalida, duracion, transporte, capacidad, precio) FROM stdin;
1	10:43:00	3	Tren	800	42
2	22:43:00	5	Tren	800	45
3	14:45:00	6	Bus	45	20
4	23:23:00	6	Bus	45	20
5	22:22:00	4	Tren	800	32
6	13:42:00	5	Tren	800	45
7	11:34:00	1	Tren	800	47
8	11:34:00	6	Bus	45	25
9	22:22:00	6	Bus	45	20
10	09:56:00	1	Tren	800	15
11	18:56:00	3	Tren	800	32
12	14:45:00	3	Avión	200	120
13	09:30:00	2	Avión	150	100
14	16:12:00	3	Tren	800	32
15	21:55:00	3	Tren	800	32
16	23:50:00	3	Tren	800	40
17	08:30:00	2	Avión	150	100
18	11:12:00	6	Bus	45	20
19	08:23:00	6	Bus	45	20
20	07:23:00	3	Tren	800	40
21	11:12:00	4	Tren	800	32
22	15:55:00	3	Avión	200	150
23	11:34:00	5	Tren	800	35
24	08:54:00	5	Tren	800	45
25	15:34:00	6	Bus	45	20
26	18:54:00	3	Avión	200	150
27	23:23:00	3	Tren	800	42
28	20:42:00	1	Tren	800	15
29	10:43:00	6	Bus	45	20
30	11:33:00	3	Avión	200	150
31	23:23:00	3	Tren	800	40
32	16:35:00	2	Avión	150	100
33	07:12:00	6	Bus	45	20
34	11:34:00	1	Bus	45	12
35	11:23:00	3	Tren	800	42
36	20:23:00	3	Avión	200	150
37	07:12:00	3	Tren	800	32
38	23:32:00	1	Tren	800	15
39	23:32:00	1	Bus	45	12
40	08:54:00	5	Tren	800	35
41	13:42:00	6	Bus	45	25
42	09:34:00	3	Tren	800	47
43	23:23:00	3	Tren	800	32
44	23:56:00	3	Avión	200	120
45	16:12:00	6	Bus	45	20
46	12:50:00	2	Avión	150	100
47	11:34:00	1	Tren	800	15
48	14:45:00	3	Tren	800	32
49	20:42:00	1	Tren	800	47
50	22:43:00	6	Bus	45	25
51	11:34:00	5	Tren	800	45
52	07:12:00	3	Avión	200	120
53	15:45:00	2	Avión	150	100
54	23:32:00	1	Tren	800	47
55	09:56:00	1	Tren	800	47
56	11:22:00	3	Tren	800	47
57	10:43:00	3	Tren	800	32
58	10:05:00	3	Avión	200	150
59	08:23:00	3	Tren	800	32
60	14:25:00	3	Avión	200	150
61	15:21:00	3	Tren	800	45
62	06:17:00	3	Avión	200	120
63	21:34:00	3	Avión	200	120
64	21:55:00	6	Bus	45	20
65	22:12:00	2	Avión	150	100
66	18:56:00	3	Tren	800	42
67	13:42:00	5	Tren	800	35
68	22:30:00	3	Avión	200	150
69	08:54:00	6	Bus	45	25
70	12:34:00	3	Avión	200	150
71	14:45:00	3	Tren	800	40
72	09:56:00	1	Bus	45	12
73	07:12:00	3	Tren	800	42
74	16:12:00	3	Tren	800	40
75	09:23:00	3	Tren	800	45
76	09:56:00	4	Tren	800	32
77	13:15:00	3	Avión	200	120
78	15:34:00	4	Tren	800	32
79	09:56:00	6	Bus	45	20
80	21:55:00	3	Tren	800	42
81	08:23:00	3	Tren	800	49
82	09:55:00	3	Avión	200	150
83	23:43:00	2	Avión	150	100
84	20:42:00	1	Bus	45	12
85	18:56:00	6	Bus	45	20
86	22:43:00	5	Tren	800	35
\.


--
-- Name: ciudades ciudades_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT ciudades_pkey PRIMARY KEY (cid);


--
-- Name: compra_ticket compra_ticket_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.compra_ticket
    ADD CONSTRAINT compra_ticket_pkey PRIMARY KEY (tid);


--
-- Name: contactos_paises contactos_paises_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.contactos_paises
    ADD CONSTRAINT contactos_paises_pkey PRIMARY KEY (cpid);


--
-- Name: datos_usuarios datos_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.datos_usuarios
    ADD CONSTRAINT datos_usuarios_pkey PRIMARY KEY (duid);


--
-- Name: destino destino_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.destino
    ADD CONSTRAINT destino_pkey PRIMARY KEY (vid);


--
-- Name: en_hotel en_hotel_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.en_hotel
    ADD CONSTRAINT en_hotel_pkey PRIMARY KEY (rid);


--
-- Name: esta_en esta_en_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.esta_en
    ADD CONSTRAINT esta_en_pkey PRIMARY KEY (hid);


--
-- Name: hace hace_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.hace
    ADD CONSTRAINT hace_pkey PRIMARY KEY (rid);


--
-- Name: hoteles hoteles_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.hoteles
    ADD CONSTRAINT hoteles_pkey PRIMARY KEY (hid);


--
-- Name: mail_usuarios mail_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.mail_usuarios
    ADD CONSTRAINT mail_usuarios_pkey PRIMARY KEY (muid);


--
-- Name: origen origen_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.origen
    ADD CONSTRAINT origen_pkey PRIMARY KEY (vid);


--
-- Name: paises paises_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.paises
    ADD CONSTRAINT paises_pkey PRIMARY KEY (pid);


--
-- Name: para para_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.para
    ADD CONSTRAINT para_pkey PRIMARY KEY (tid);


--
-- Name: pertenece_a pertenece_a_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.pertenece_a
    ADD CONSTRAINT pertenece_a_pkey PRIMARY KEY (cid);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (rid);


--
-- Name: tickets tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (tid);


--
-- Name: tiene_contacto tiene_contacto_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_contacto
    ADD CONSTRAINT tiene_contacto_pkey PRIMARY KEY (cpid);


--
-- Name: tiene_datos tiene_datos_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_datos
    ADD CONSTRAINT tiene_datos_pkey PRIMARY KEY (duid);


--
-- Name: tiene_mail tiene_mail_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_mail
    ADD CONSTRAINT tiene_mail_pkey PRIMARY KEY (muid);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (uid);


--
-- Name: viajes viajes_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.viajes
    ADD CONSTRAINT viajes_pkey PRIMARY KEY (vid);


--
-- Name: compra_ticket compra_ticket_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.compra_ticket
    ADD CONSTRAINT compra_ticket_uid_fkey FOREIGN KEY (uid) REFERENCES public.usuarios(uid);


--
-- Name: destino destino_cid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.destino
    ADD CONSTRAINT destino_cid_fkey FOREIGN KEY (cid) REFERENCES public.ciudades(cid);


--
-- Name: en_hotel en_hotel_hid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.en_hotel
    ADD CONSTRAINT en_hotel_hid_fkey FOREIGN KEY (hid) REFERENCES public.hoteles(hid);


--
-- Name: esta_en esta_en_cid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.esta_en
    ADD CONSTRAINT esta_en_cid_fkey FOREIGN KEY (cid) REFERENCES public.ciudades(cid);


--
-- Name: hace hace_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.hace
    ADD CONSTRAINT hace_uid_fkey FOREIGN KEY (uid) REFERENCES public.usuarios(uid);


--
-- Name: origen origen_cid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.origen
    ADD CONSTRAINT origen_cid_fkey FOREIGN KEY (cid) REFERENCES public.ciudades(cid);


--
-- Name: para para_vid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.para
    ADD CONSTRAINT para_vid_fkey FOREIGN KEY (vid) REFERENCES public.viajes(vid);


--
-- Name: pertenece_a pertenece_a_pid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.pertenece_a
    ADD CONSTRAINT pertenece_a_pid_fkey FOREIGN KEY (pid) REFERENCES public.paises(pid);


--
-- Name: tiene_contacto tiene_contacto_pid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_contacto
    ADD CONSTRAINT tiene_contacto_pid_fkey FOREIGN KEY (pid) REFERENCES public.paises(pid);


--
-- Name: tiene_datos tiene_datos_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_datos
    ADD CONSTRAINT tiene_datos_uid_fkey FOREIGN KEY (uid) REFERENCES public.usuarios(uid);


--
-- Name: tiene_mail tiene_mail_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo77
--

ALTER TABLE ONLY public.tiene_mail
    ADD CONSTRAINT tiene_mail_uid_fkey FOREIGN KEY (uid) REFERENCES public.usuarios(uid);


--
-- PostgreSQL database dump complete
--

