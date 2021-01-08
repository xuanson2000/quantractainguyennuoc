/* ---------------------------------------------------------------------- */
/* Script generated with: DeZign for Databases V8.1.2                     */
/* Target DBMS:           PostgreSQL 9                                    */
/* Project file:          dezign.dez                                      */
/* Project name:                                                          */
/* Author:                                                                */
/* Script type:           Database drop script                            */
/* Created on:            2018-07-08 11:41                                */
/* ---------------------------------------------------------------------- */


/* ---------------------------------------------------------------------- */
/* Drop foreign key constraints                                           */
/* ---------------------------------------------------------------------- */

ALTER TABLE public.web_categories DROP CONSTRAINT categories_parent_id_foreign;

ALTER TABLE public.web_model_has_permissions DROP CONSTRAINT model_has_permissions_permission_id_foreign;

ALTER TABLE public.web_model_has_roles DROP CONSTRAINT model_has_roles_role_id_foreign;

ALTER TABLE public.web_role_has_permissions DROP CONSTRAINT role_has_permissions_permission_id_foreign;

ALTER TABLE public.web_role_has_permissions DROP CONSTRAINT role_has_permissions_role_id_foreign;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_role_has_permissions"                           */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_role_has_permissions DROP CONSTRAINT web_role_has_permissions_pkey;

DROP TABLE public.web_role_has_permissions;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_model_has_roles"                                */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_model_has_roles DROP CONSTRAINT web_model_has_roles_pkey;

DROP TABLE public.web_model_has_roles;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_model_has_permissions"                          */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_model_has_permissions DROP CONSTRAINT web_model_has_permissions_pkey;

DROP TABLE public.web_model_has_permissions;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_users"                                          */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_users DROP CONSTRAINT web_users_pkey;

DROP TABLE public.web_users;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_settings"                                       */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_settings DROP CONSTRAINT web_settings_pkey;

DROP TABLE public.web_settings;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_roles"                                          */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_roles DROP CONSTRAINT web_roles_pkey;

DROP TABLE public.web_roles;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_projections"                                    */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_projections DROP CONSTRAINT web_projections_pkey;

DROP TABLE public.web_projections;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_permissions"                                    */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_permissions DROP CONSTRAINT web_permissions_pkey;

DROP TABLE public.web_permissions;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_pages"                                          */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_pages DROP CONSTRAINT web_pages_pkey;

ALTER TABLE public.web_pages DROP CONSTRAINT pages_status_check;

DROP TABLE public.web_pages;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_ollayers"                                       */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_ollayers DROP CONSTRAINT web_ollayers_pkey;

DROP TABLE public.web_ollayers;

/* ---------------------------------------------------------------------- */
/* Drop table "public.migrations"                                         */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.migrations DROP CONSTRAINT migrations_pkey;

DROP TABLE public.migrations;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_maps"                                           */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_maps DROP CONSTRAINT web_pk_map;

DROP TABLE public.web_maps;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_layers"                                         */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_layers DROP CONSTRAINT web_pk_layers;

DROP TABLE public.web_layers;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_layer_groups"                                   */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_layer_groups DROP CONSTRAINT pk_layer_group;

DROP TABLE public.web_layer_groups;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_categories"                                     */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_categories DROP CONSTRAINT web_categories_pkey;

DROP TABLE public.web_categories;

/* ---------------------------------------------------------------------- */
/* Drop table "public.web_articles"                                       */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE public.web_articles DROP CONSTRAINT web_articles_pkey;

ALTER TABLE public.web_articles DROP CONSTRAINT posts_status_check;

DROP TABLE public.web_articles;

/* ---------------------------------------------------------------------- */
/* Drop sequences                                                         */
/* ---------------------------------------------------------------------- */

DROP SEQUENCE public.web_layers_id_seq;

DROP SEQUENCE public.web_layer_group_id_seq;

DROP SEQUENCE public.web_ollayers_id_seq;

DROP SEQUENCE public.web_map_id_seq;

DROP SEQUENCE public.web_migrations_id_seq;

DROP SEQUENCE public.web_users_id_seq;

DROP SEQUENCE public.web_pages_id_seq;

DROP SEQUENCE public.web_articles_id_seq;

DROP SEQUENCE public.web_categories_id_seq;

DROP SEQUENCE public.web_settings_id_seq;

DROP SEQUENCE public.web_projections_id_seq;

DROP SEQUENCE public.web_permissions_id_seq;

DROP SEQUENCE public.web_roles_id_seq;
