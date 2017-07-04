--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

--
-- Name: class_size; Type: VIEW; Schema: public; Owner: hom
--

CREATE VIEW class_size AS
 SELECT s.class_id,
    count(*) AS student_count
   FROM student s
  GROUP BY s.class_id;


ALTER TABLE class_size OWNER TO hom;

--
-- Name: class_size; Type: ACL; Schema: public; Owner: hom
--

GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE class_size TO peerweb;


--
-- PostgreSQL database dump complete
--

