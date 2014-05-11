-- Table: asset

DROP TABLE asset;

CREATE TABLE asset
(
  a_id serial NOT NULL,
  a_type_id integer,
  a_id_tag integer,
  a_desc text,
  a_status text,
  a_lat double precision,
  a_long double precision,
  a_remarks text,
  CONSTRAINT asset_pkey PRIMARY KEY (a_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE asset
  OWNER TO postgres;


-- Table: asset_ass

DROP TABLE asset_ass;

CREATE TABLE asset_ass
(
  a_id integer NOT NULL,
  req_id integer NOT NULL,
  CONSTRAINT asset_ass_pkey PRIMARY KEY (a_id, req_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE asset_ass
  OWNER TO postgres;


-- Table: asset_type

DROP TABLE asset_type;

CREATE TABLE asset_type
(
  a_type_id serial NOT NULL,
  a_type_desc text,
  CONSTRAINT asset_type_pkey PRIMARY KEY (a_type_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE asset_type
  OWNER TO postgres;



-- Table: request

DROP TABLE request;

CREATE TABLE request
(
  req_id serial NOT NULL,
  event_id integer,
  req_desc text,
  req_lat double precision,
  req_long double precision,
  req_dt_start timestamp without time zone,
  req_dt_stop timestamp without time zone,
  CONSTRAINT request_pkey PRIMARY KEY (req_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE request
  OWNER TO postgres;


-- Table: "user"

DROP TABLE "user";

CREATE TABLE "user"
(
  u_id serial NOT NULL,
  ul_id integer,
  u_name text,
  CONSTRAINT user_pkey PRIMARY KEY (u_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "user"
  OWNER TO postgres;


-- Table: user_level

DROP TABLE user_level;

CREATE TABLE user_level
(
  ul_id serial NOT NULL,
  ul_desc text,
  CONSTRAINT user_level_pkey PRIMARY KEY (ul_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE user_level
  OWNER TO postgres;

