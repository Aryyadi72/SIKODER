CREATE TABLE TYPE (
	type_id INT GENERATED ALWAYS AS IDENTITY,
	type_name VARCHAR(128),
	PRIMARY KEY(type_id)
);

CREATE TABLE model (
	model_id INT GENERATED ALWAYS AS IDENTITY,
	type_id INT,
	model_name VARCHAR(128),
	model_number VARCHAR(128),
	PRIMARY KEY(model_id),
	CONSTRAINT model_type
	FOREIGN KEY (type_id)
	REFERENCES type(type_id)
	ON DELETE SET NULL
);

CREATE TABLE hardware (
	hardware_id INT NOT NULL GENERATED ALWAYS AS IDENTITY,
	hardware_name VARCHAR(128),
	hardware_description TEXT,
	hardware_picture VARCHAR(128),
	PRIMARY KEY (hardware_id)
);

CREATE TABLE vendor (
	vendor_id INT NOT NULL GENERATED ALWAYS AS IDENTITY,
	vendor_name VARCHAR(128),
	PRIMARY KEY (vendor_id)
);

CREATE TABLE status (
	status_id INT NOT NULL GENERATED ALWAYS AS IDENTITY,
	status_name VARCHAR(128),
	status_indicator VARCHAR(32),
	PRIMARY KEY (status_id)
);

CREATE TABLE manufacturer (
	manufacturer_id INT NOT NULL GENERATED ALWAYS AS IDENTITY,
	manufacturer_name VARCHAR(128),
	PRIMARY KEY (manufacturer_id)
);

CREATE TABLE unit (
	unit_id INT NOT NULL GENERATED ALWAYS AS IDENTITY,
	unit_name VARCHAR(128),
	PRIMARY KEY (unit_id)
);

CREATE TABLE hardware_use (
	hu_id INT GENERATED ALWAYS AS IDENTITY,
	user_id INT,
	hardware_id INT,
	manufacturer_id INT,
	vendor_id INT,
	status_id INT,
	model_id INT,
	unit_id INT,
	location_id INT,
	description_hu TEXT,
	serial_number VARCHAR(128),
	purchase_price INT,
	purchase_date DATE,
	waranty_exp DATE,
	last_service DATE,
	owner INT,
	created_by INT,
	created_date DATE,
	last_modified_by INT,
	last_modified_date DATE,
	asset_code VARCHAR(64),
	delivery_date DATE,
	reference TEXT,
	PRIMARY KEY(hu_id)
);

