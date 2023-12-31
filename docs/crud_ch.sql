PGDMP                         {            crud_ch    15.3    15.3                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16442    crud_ch    DATABASE     z   CREATE DATABASE crud_ch WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Chile.1252';
    DROP DATABASE crud_ch;
                postgres    false            �            1259    16444 	   tm_bodega    TABLE     �  CREATE TABLE public.tm_bodega (
    bod_id integer NOT NULL,
    enc_id integer,
    bod_cod character varying(5) NOT NULL,
    bod_nom character varying(100) NOT NULL,
    bod_direcc character varying(255) NOT NULL,
    bod_dot integer NOT NULL,
    fech_crea timestamp without time zone NOT NULL,
    est_id integer NOT NULL,
    fech_modi timestamp without time zone,
    fech_elim timestamp without time zone,
    est integer NOT NULL,
    trial127 character(1)
);
    DROP TABLE public.tm_bodega;
       public         heap    postgres    false            �            1259    16443    tm_bodega_bod_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tm_bodega_bod_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tm_bodega_bod_id_seq;
       public          postgres    false    215                       0    0    tm_bodega_bod_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.tm_bodega_bod_id_seq OWNED BY public.tm_bodega.bod_id;
          public          postgres    false    214            �            1259    16451    tm_encargado    TABLE     )  CREATE TABLE public.tm_encargado (
    enc_id integer NOT NULL,
    rut character varying(12) NOT NULL,
    enc_nom character varying(255) NOT NULL,
    enc_direcc character varying(255) NOT NULL,
    enc_telf character varying(12) NOT NULL,
    est integer NOT NULL,
    trial130 character(1)
);
     DROP TABLE public.tm_encargado;
       public         heap    postgres    false            �            1259    16450    tm_encargado_enc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tm_encargado_enc_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tm_encargado_enc_id_seq;
       public          postgres    false    217                       0    0    tm_encargado_enc_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tm_encargado_enc_id_seq OWNED BY public.tm_encargado.enc_id;
          public          postgres    false    216            �            1259    16460 	   tm_estado    TABLE     �   CREATE TABLE public.tm_estado (
    est_id integer NOT NULL,
    est_nom character varying(255) NOT NULL,
    fech_crea timestamp without time zone NOT NULL,
    trial130 character(1)
);
    DROP TABLE public.tm_estado;
       public         heap    postgres    false            �            1259    16459    tm_estado_est_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tm_estado_est_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tm_estado_est_id_seq;
       public          postgres    false    219                       0    0    tm_estado_est_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.tm_estado_est_id_seq OWNED BY public.tm_estado.est_id;
          public          postgres    false    218            o           2604    16447    tm_bodega bod_id    DEFAULT     t   ALTER TABLE ONLY public.tm_bodega ALTER COLUMN bod_id SET DEFAULT nextval('public.tm_bodega_bod_id_seq'::regclass);
 ?   ALTER TABLE public.tm_bodega ALTER COLUMN bod_id DROP DEFAULT;
       public          postgres    false    214    215    215            p           2604    16454    tm_encargado enc_id    DEFAULT     z   ALTER TABLE ONLY public.tm_encargado ALTER COLUMN enc_id SET DEFAULT nextval('public.tm_encargado_enc_id_seq'::regclass);
 B   ALTER TABLE public.tm_encargado ALTER COLUMN enc_id DROP DEFAULT;
       public          postgres    false    216    217    217            q           2604    16463    tm_estado est_id    DEFAULT     t   ALTER TABLE ONLY public.tm_estado ALTER COLUMN est_id SET DEFAULT nextval('public.tm_estado_est_id_seq'::regclass);
 ?   ALTER TABLE public.tm_estado ALTER COLUMN est_id DROP DEFAULT;
       public          postgres    false    218    219    219                      0    16444 	   tm_bodega 
   TABLE DATA           �   COPY public.tm_bodega (bod_id, enc_id, bod_cod, bod_nom, bod_direcc, bod_dot, fech_crea, est_id, fech_modi, fech_elim, est, trial127) FROM stdin;
    public          postgres    false    215   �       	          0    16451    tm_encargado 
   TABLE DATA           a   COPY public.tm_encargado (enc_id, rut, enc_nom, enc_direcc, enc_telf, est, trial130) FROM stdin;
    public          postgres    false    217   ;                 0    16460 	   tm_estado 
   TABLE DATA           I   COPY public.tm_estado (est_id, est_nom, fech_crea, trial130) FROM stdin;
    public          postgres    false    219                     0    0    tm_bodega_bod_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.tm_bodega_bod_id_seq', 1, true);
          public          postgres    false    214                       0    0    tm_encargado_enc_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.tm_encargado_enc_id_seq', 4, true);
          public          postgres    false    216                       0    0    tm_estado_est_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.tm_estado_est_id_seq', 2, true);
          public          postgres    false    218            s           2606    16449    tm_bodega pk_tm_bodega 
   CONSTRAINT     X   ALTER TABLE ONLY public.tm_bodega
    ADD CONSTRAINT pk_tm_bodega PRIMARY KEY (bod_id);
 @   ALTER TABLE ONLY public.tm_bodega DROP CONSTRAINT pk_tm_bodega;
       public            postgres    false    215            u           2606    16458    tm_encargado pk_tm_encargado 
   CONSTRAINT     ^   ALTER TABLE ONLY public.tm_encargado
    ADD CONSTRAINT pk_tm_encargado PRIMARY KEY (enc_id);
 F   ALTER TABLE ONLY public.tm_encargado DROP CONSTRAINT pk_tm_encargado;
       public            postgres    false    217            w           2606    16465    tm_estado pk_tm_estado 
   CONSTRAINT     X   ALTER TABLE ONLY public.tm_estado
    ADD CONSTRAINT pk_tm_estado PRIMARY KEY (est_id);
 @   ALTER TABLE ONLY public.tm_estado DROP CONSTRAINT pk_tm_estado;
       public            postgres    false    219               U   x�3�4�t��40�t�wquwT��LN�K�QH,�L�W0305�440�4202�50�52Q00�25"�N4Qs+Cs�?�DW� �sQ      	   �   x�m��j�0���z��(��Xv�(�B������a���I����eמ�O���l#ʝ��r���"��]���r�����]�Kh!�����ת�k�J����pHs���TX��F; ���-R����~K���Gژ­P�i.a+�I�������r�[��&|Oc�Rd��R��?�����h�Db         9   x�3�tL.�,KL��4202�50�52T04�2��24��2�tI-N��Iġ&F��� ���     