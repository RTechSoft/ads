-- Table: "Asset"

-- DROP TABLE "Asset";

CREATE TABLE "Asset"
(
  "A_ID" integer,
  "A_Type_ID" integer,
  "A_ID_Tag" character varying,
  "A_Desc" text,
  "Status" text,
  "A_Lat" double precision,
  "A_Long" double precision,
  "Remarks" text
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "Asset"
  OWNER TO postgres;




-- Table: "Asset_Ass"

-- DROP TABLE "Asset_Ass";

CREATE TABLE "Asset_Ass"
(
  "A_ID" integer,
  "Req_ID" integer
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "Asset_Ass"
  OWNER TO postgres;



-- Table: "Asset_Type"

-- DROP TABLE "Asset_Type";

CREATE TABLE "Asset_Type"
(
  "A_Type_ID" integer,
  "A_Type_Desc" text
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "Asset_Type"
  OWNER TO postgres;


SELECT "Req_ID", "Event_ID", "Req_Desc", "Req_Lat", "Req_Long", "Req_DT_Start", 
       "Req_DT_End"
  FROM "Request";


-- Table: "Request"

-- DROP TABLE "Request";

CREATE TABLE "Request"
(
  "Req_ID" integer,
  "Event_ID" integer,
  "Req_Desc" text,
  "Req_Lat" double precision,
  "Req_Long" double precision,
  "Req_DT_Start" timestamp without time zone,
  "Req_DT_End" timestamp without time zone
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "Request"
  OWNER TO postgres;


-- Table: "User"

-- DROP TABLE "User";

CREATE TABLE "User"
(
  "U_ID" integer,
  "UL_ID" integer,
  "U_Name" text
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "User"
  OWNER TO postgres;


-- Table: "User_Level"

-- DROP TABLE "User_Level";

CREATE TABLE "User_Level"
(
  "UL_ID" integer,
  "UL_Desc" text
)
WITH (
  OIDS=FALSE
);
ALTER TABLE "User_Level"
  OWNER TO postgres;
