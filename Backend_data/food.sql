CREATE table "FOOD" (
    "FOOD_ID"        VARCHAR2(255) NOT NULL,
    "FOODNAME"       VARCHAR2(255),
    "QUANTITY"       NUMBER(10,0),
    "FOODTYPE"       VARCHAR2(255),
    "EXPIRATIONDATE" VARCHAR2(255),
    constraint  "FOOD_PK" primary key ("FOOD_ID")
)
/

alter table "FOOD" add
constraint "FOOD_CK1" 
check (quantity > 0)
/   

CREATE SEQUENCE
FOOD_FOOD_ID_SQ
INCREMENT BY 1
START WITH 100
MAXVALUE 99999
NOCYCLE ;
