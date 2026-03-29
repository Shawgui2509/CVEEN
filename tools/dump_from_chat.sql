-- Extrait du dump PostgreSQL fourni dans le chat

COPY mon_schema.users (id, name) FROM stdin;
\.

COPY public.reservation (id_reservation, datedebut, datefin, nbpersonne, pension, menage, valide, id_user, typelogement) FROM stdin;
30	2025-09-23	2025-09-27	1	\N	t	Annulee	6	studio
\.

COPY public.typelogement (typelogement, nblitdouble, nblitsimple) FROM stdin;
studio	\N	\N
villa	\N	\N
appartement	\N	\N
chalet	\N	\N
\.

COPY public.users (id_user, prenom, nom, date_naissance, genre, email, password, created_at, updated_at, role, essai, salt) FROM stdin;
3	Dawens	Deka	2005-12-15	Homme	deka@gmail.com	$2y$10$Af.zeKQd17OqbOqSiIx5ve9pW33nfQ1KXEpClXqbM9f3ECZyxXFgm	2025-02-25 07:52:20	2025-02-25 07:52:20	user	0	\N
5	Franck	Touko	2025-03-06	Homme	fetouko@icloud.com	$2y$10$Ixo2GxSgwpCPTh7mGN/P/uRFIwn3vu6wDzgH3hr8MMQR8q04Xw4n6	2025-03-05 09:59:55	2025-03-05 09:59:55	user	0	\N
1	Admin	Root	\N	\N	admin@example.com	$2y$10$34zpYJUnhFaKfiq4s4OnCuOWiccQFD.Tikd4xNYHkIb86hluv4d7O	2025-02-25 14:40:21.294535	2025-02-25 14:45:12.91267	admin	0	\N
6	shawn	guillaume	2004-12-25	Homme	shawn2@gmail.com	$2y$10$d.4MmKsuCPsAAjz8vhQjDOHJlAr7AplLOvWGb.uxD0Y1/fnp1G.MC	2025-04-28 02:21:03	2025-04-28 02:21:03	user	0	\N
7	shawgui	jeremy	2004-12-25	Homme	shawgui@gmail.com	$2y$10$bg5YHazUmoksHvB0dLMR2ep0twxPONH2PhKaNTFf8U4EVrBjuApHy	2025-09-08 07:44:08	2025-09-08 07:45:51	user	4	7fc7043ab4ae4bc0aed80325d19c05723e019e63c3318fd205c32aa91e640be2
4	Jeremy	Guillaume	2004-12-25	Homme	jeremy@gmail.com	$2y$10$envILcKKBrlrFLJ0UdDVFu6kUfg7AUIMGPfrcCoFaqYZN0MUsj.SO	2025-03-03 07:51:37	2025-09-08 07:47:56	user	0	\N
2	shawn	guillaume	2001-12-25	Homme	shawn@gmail.com	$2y$10$JuJG5cV9wBbpFmtcdMo4Uu7OspTClcusl18k/REQUcg2Pu7.nx2BO	2025-02-25 07:45:53	2025-09-22 08:29:03	user	1	\N
\.
