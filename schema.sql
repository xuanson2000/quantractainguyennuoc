/* ---------------------------------------------------------------------- */
/* Script generated with: DeZign for Databases V8.1.2                     */
/* Target DBMS:           PostgreSQL 9                                    */
/* Project file:          dezign.dez                                      */
/* Project name:                                                          */
/* Author:                                                                */
/* Script type:           Database creation script                        */
/* Created on:            2018-07-08 11:41                                */
/* ---------------------------------------------------------------------- */


/* ---------------------------------------------------------------------- */
/* Add sequences                                                          */
/* ---------------------------------------------------------------------- */

CREATE SEQUENCE public.web_layers_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_layer_group_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_ollayers_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_map_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_migrations_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_users_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_pages_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_articles_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_categories_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_settings_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_projections_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_permissions_id_seq INCREMENT 1 MINVALUE 0 START 0;

CREATE SEQUENCE public.web_roles_id_seq INCREMENT 1 MINVALUE 0 START 0;

/* ---------------------------------------------------------------------- */
/* Add tables                                                             */
/* ---------------------------------------------------------------------- */

/* ---------------------------------------------------------------------- */
/* Add table "public.web_articles"                                        */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_articles (
    id INTEGER DEFAULT nextval('web_articles_id_seq')  NOT NULL,
    author CHARACTER VARYING(255)  NOT NULL,
    category_id INTEGER,
    title CHARACTER VARYING(255)  NOT NULL,
    seo_title CHARACTER VARYING(255),
    excerpt TEXT,
    content TEXT  NOT NULL,
    image CHARACTER VARYING(255),
    slug CHARACTER VARYING(255)  NOT NULL,
    meta_description TEXT,
    meta_keywords TEXT,
    article_status CHARACTER VARYING(255) DEFAULT 'DRAFT'  NOT NULL,
    featured BOOLEAN DEFAULT false  NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    delete_at TIMESTAMP,
    CONSTRAINT web_articles_pkey PRIMARY KEY (id),
    CONSTRAINT posts_status_check CHECK ((article_status) = ANY (ARRAY[('PUBLISHED'), ('DRAFT'), ('PENDING')]))
);

CREATE UNIQUE INDEX posts_slug_unique ON public.web_articles (slug);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_categories"                                      */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_categories (
    id INTEGER DEFAULT nextval('web_categories_id_seq')  NOT NULL,
    parent_id INTEGER,
    cat_order INTEGER DEFAULT 1  NOT NULL,
    name CHARACTER VARYING(255)  NOT NULL,
    slug CHARACTER VARYING(255)  NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT web_categories_pkey PRIMARY KEY (id)
);

CREATE UNIQUE INDEX categories_slug_unique ON public.web_categories (slug);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_layer_groups"                                    */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_layer_groups (
    id BIGINT DEFAULT nextval('web_layer_group_id_seq')  NOT NULL,
    mapid BIGINT,
    group_name CHARACTER(255),
    description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    delete_at TIMESTAMP,
    CONSTRAINT pk_layer_group PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_layers"                                          */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_layers (
    id BIGINT  NOT NULL,
    map_id BIGINT,
    group_id BIGINT,
    layer_name CHARACTER(255),
    layer_title TEXT,
    description TEXT,
    layer_type CHARACTER(40),
    connection_type CHARACTER(40),
    source TEXT,
    isbaselayer SMALLINT,
    alpha SMALLINT,
    displayintoc SMALLINT,
    visibility SMALLINT,
    attribution CHARACTER(255),
    inrange SMALLINT,
    gutter INTEGER,
    projection CHARACTER(255),
    units CHARACTER(255),
    scales TEXT,
    resolutions TEXT,
    maxextent TEXT,
    minextent TEXT,
    maxresolution DOUBLE PRECISION,
    minresolution DOUBLE PRECISION,
    numzoomlevels INTEGER,
    minscale DOUBLE PRECISION,
    maxscale DOUBLE PRECISION,
    displayoutsidemaxextent SMALLINT,
    wrapdateline SMALLINT,
    metadata TEXT,
    CONSTRAINT web_pk_layers PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_maps"                                            */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_maps (
    id BIGINT DEFAULT nextval('web_map_id_seq')  NOT NULL,
    map_name CHARACTER(255)  NOT NULL,
    map_title CHARACTER(255)  NOT NULL,
    map_abstract TEXT,
    extent_minx DOUBLE PRECISION,
    extent_miny DOUBLE PRECISION,
    extent_maxx DOUBLE PRECISION,
    extent_maxy DOUBLE PRECISION,
    status BOOLEAN,
    unit CHARACTER(40),
    size_x CHARACTER(40),
    size_y CHARACTER(40),
    proj CHARACTER(40),
    web_minscale INTEGER,
    web_maxscale INTEGER,
    ref_image_link TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    delete_at TIMESTAMP,
    CONSTRAINT web_pk_map PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.migrations"                                          */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.migrations (
    id INTEGER DEFAULT nextval('web_migrations_id_seq')  NOT NULL,
    migration CHARACTER VARYING(255)  NOT NULL,
    batch INTEGER  NOT NULL,
    CONSTRAINT migrations_pkey PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_ollayers"                                        */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_ollayers (
    id BIGINT DEFAULT nextval('web_ollayers_id_seq')  NOT NULL,
    map_id BIGINT,
    group_id BIGINT,
    layer_name CHARACTER(255),
    layer_title TEXT,
    description TEXT,
    opacity DOUBLE PRECISION,
    source TEXT,
    visible BOOLEAN,
    minxextent DOUBLE PRECISION,
    minyextent DOUBLE PRECISION,
    maxxextent DOUBLE PRECISION,
    maxyextent DOUBLE PRECISION,
    zindex SMALLINT,
    minresolution DOUBLE PRECISION,
    maxresolution DOUBLE PRECISION,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    delete_at TIMESTAMP,
    CONSTRAINT web_ollayers_pkey PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_pages"                                           */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_pages (
    id INTEGER DEFAULT nextval('web_pages_id_seq')  NOT NULL,
    author_id INTEGER  NOT NULL,
    title CHARACTER VARYING(255)  NOT NULL,
    excerpt TEXT,
    body TEXT,
    image CHARACTER VARYING(255),
    slug CHARACTER VARYING(255)  NOT NULL,
    meta_description TEXT,
    meta_keywords TEXT,
    status CHARACTER VARYING(255) DEFAULT 'INACTIVE'  NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT web_pages_pkey PRIMARY KEY (id),
    CONSTRAINT pages_status_check CHECK ((status) = ANY ((ARRAY['ACTIVE', 'INACTIVE'])))
);

CREATE UNIQUE INDEX pages_slug_unique ON public.web_pages (slug);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_permissions"                                     */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_permissions (
    id INTEGER DEFAULT nextval('web_permissions_id_seq')  NOT NULL,
    name CHARACTER VARYING(255)  NOT NULL,
    guard_name CHARACTER VARYING(255)  NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT web_permissions_pkey PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_projections"                                     */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_projections (
    id BIGINT DEFAULT nextval('web_projections_id_seq')  NOT NULL,
    srid INTEGER,
    proj4_params TEXT,
    extent CHARACTER VARYING(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT web_projections_pkey PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_roles"                                           */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_roles (
    id INTEGER DEFAULT nextval('web_roles_id_seq')  NOT NULL,
    name CHARACTER VARYING(255)  NOT NULL,
    guard_name CHARACTER VARYING(255)  NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT web_roles_pkey PRIMARY KEY (id)
);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_settings"                                        */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_settings (
    id INTEGER DEFAULT nextval('web_settings_id_seq')  NOT NULL,
    key CHARACTER VARYING(255)  NOT NULL,
    display_name CHARACTER VARYING(255)  NOT NULL,
    value TEXT  NOT NULL,
    details TEXT,
    type CHARACTER VARYING(255)  NOT NULL,
    web_order INTEGER DEFAULT 1  NOT NULL,
    web_group CHARACTER VARYING(255),
    CONSTRAINT web_settings_pkey PRIMARY KEY (id)
);

CREATE UNIQUE INDEX settings_key_unique ON public.web_settings (key);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_users"                                           */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_users (
    id INTEGER DEFAULT nextval('web_users_id_seq')  NOT NULL,
    name CHARACTER VARYING(255)  NOT NULL,
    email CHARACTER VARYING(255)  NOT NULL,
    password CHARACTER VARYING(255)  NOT NULL,
    remember_token CHARACTER VARYING(100),
    created_at TIME,
    updated_at TIME,
    CONSTRAINT web_users_pkey PRIMARY KEY (id)
);

CREATE UNIQUE INDEX users_email_unique ON public.web_users (email);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_model_has_permissions"                           */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_model_has_permissions (
    permission_id INTEGER  NOT NULL,
    model_type CHARACTER VARYING(255)  NOT NULL,
    model_id BIGINT  NOT NULL,
    CONSTRAINT web_model_has_permissions_pkey PRIMARY KEY (permission_id, model_type, model_id)
);

CREATE INDEX model_has_permissions_model_type_model_id_index ON public.web_model_has_permissions (model_type,model_id);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_model_has_roles"                                 */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_model_has_roles (
    role_id INTEGER  NOT NULL,
    model_type CHARACTER VARYING(255)  NOT NULL,
    model_id BIGINT  NOT NULL,
    CONSTRAINT web_model_has_roles_pkey PRIMARY KEY (role_id, model_type, model_id)
);

CREATE INDEX model_has_roles_model_type_model_id_index ON public.web_model_has_roles (model_type,model_id);

/* ---------------------------------------------------------------------- */
/* Add table "public.web_role_has_permissions"                            */
/* ---------------------------------------------------------------------- */

CREATE TABLE public.web_role_has_permissions (
    permission_id INTEGER  NOT NULL,
    role_id INTEGER  NOT NULL,
    CONSTRAINT web_role_has_permissions_pkey PRIMARY KEY (permission_id, role_id)
);

/* ---------------------------------------------------------------------- */
/* Add foreign key constraints                                            */
/* ---------------------------------------------------------------------- */

ALTER TABLE public.web_categories ADD CONSTRAINT categories_parent_id_foreign 
    FOREIGN KEY (parent_id) REFERENCES public.web_categories (id) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE public.web_model_has_permissions ADD CONSTRAINT model_has_permissions_permission_id_foreign 
    FOREIGN KEY (permission_id) REFERENCES public.web_permissions (id) ON DELETE CASCADE;

ALTER TABLE public.web_model_has_roles ADD CONSTRAINT model_has_roles_role_id_foreign 
    FOREIGN KEY (role_id) REFERENCES public.web_roles (id) ON DELETE CASCADE;

ALTER TABLE public.web_role_has_permissions ADD CONSTRAINT role_has_permissions_permission_id_foreign 
    FOREIGN KEY (permission_id) REFERENCES public.web_permissions (id) ON DELETE CASCADE;

ALTER TABLE public.web_role_has_permissions ADD CONSTRAINT role_has_permissions_role_id_foreign 
    FOREIGN KEY (role_id) REFERENCES public.web_roles (id) ON DELETE CASCADE;
