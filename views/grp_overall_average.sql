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
-- Name: grp_overall_average; Type: VIEW; Schema: public; Owner: hom
--

CREATE VIEW grp_overall_average AS
 SELECT assessment.prjtg_id,
    avg(assessment.grade) AS grp_avg
   FROM assessment
  GROUP BY assessment.prjtg_id;


ALTER TABLE grp_overall_average OWNER TO hom;

--
-- Name: VIEW grp_overall_average; Type: COMMENT; Schema: public; Owner: hom
--

COMMENT ON VIEW grp_overall_average IS 'used by tutor/groupresult.php';


--
-- Name: grp_overall_average; Type: ACL; Schema: public; Owner: hom
--

GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE grp_overall_average TO peerweb;


--
-- PostgreSQL database dump complete
--

