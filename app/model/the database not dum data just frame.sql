-- nhớ đặt tên bảng là "lining" nha 🖕 && remember to set database name is "lining" ❤️

CREATE TABLE product_types (
  id_type INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_type VARCHAR(50) NOT NULL
);

CREATE TABLE product_colors (
  id_color INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_color VARCHAR(50) NOT NULL
);

CREATE TABLE materials (
  id_material INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_material VARCHAR(50) NOT NULL
);

CREATE TABLE product_forms (
  id_form INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_form VARCHAR(50) NOT NULL
);

CREATE TABLE description_texts (
  id_text INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content TEXT NOT NULL
);

CREATE TABLE pictures (
  id_pic INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  index_pic INT(11) NOT NULL,
  path_pic VARCHAR(255) NOT NULL,
  alt_text VARCHAR(255) NOT NULL
);

CREATE TABLE descriptions (
  id_prod_descripts INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  type_prods INT(11) NOT NULL,
  code_prods INT(11) NOT NULL,
  color_prods INT(11) NOT NULL,
  material_prods INT(11) NOT NULL,
  forms INT(11) NOT NULL,
  id_pic INT(11) NOT NULL,
  id_text INT(11) NOT NULL,
  FOREIGN KEY (type_prods) REFERENCES product_types(id_type),
  FOREIGN KEY (color_prods) REFERENCES product_colors(id_color),
  FOREIGN KEY (material_prods) REFERENCES materials(id_material),
  FOREIGN KEY (forms) REFERENCES product_forms(id_form),
  FOREIGN KEY (id_pic) REFERENCES pictures(id_pic),
  FOREIGN KEY (id_text) REFERENCES description_texts(id_text)
);

CREATE TABLE products (
  id_prods INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_prods VARCHAR(255) NOT NULL,
  price_prods DECIMAL(10,2) NOT NULL,
  size_prods VARCHAR(20) NOT NULL,
  quantity_prods INT(11) NOT NULL,
  id_prod_descripts INT(11) NOT NULL,
  FOREIGN KEY (id_prod_descripts) REFERENCES descriptions(id_prod_descripts)
);

CREATE TABLE roles (
  id_role TINYINT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(50) NOT NULL
);

CREATE TABLE users (
  id_users INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  phone_number VARCHAR(20) NOT NULL,
  password VARCHAR(100) NOT NULL,
  role TINYINT(4) NOT NULL,
  FOREIGN KEY (role) REFERENCES roles(id_role)
);

CREATE TABLE shopcarts (
  id_shopcarts INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_users INT(11) NOT NULL,
  FOREIGN KEY (id_users) REFERENCES users(id_users)
);

CREATE TABLE cart_items (
  id_cart_items INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_shopcarts INT(11) NOT NULL,
  id_prods INT(11) NOT NULL,
  quantities INT(11) NOT NULL,
  FOREIGN KEY (id_shopcarts) REFERENCES shopcarts(id_shopcarts),
  FOREIGN KEY (id_prods) REFERENCES products(id_prods)
);

CREATE TABLE payments (
  id_payments INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  address VARCHAR(255) NOT NULL,
  method_payment INT(11) NOT NULL
);

CREATE TABLE orders (
  id_orders INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_users INT(11) NOT NULL,
  order_date DATE NOT NULL,
  status TINYINT(4) NOT NULL,
  total_prices DECIMAL(10,2) NOT NULL,
  id_payments INT(11) NOT NULL,
  FOREIGN KEY (id_users) REFERENCES users(id_users),
  FOREIGN KEY (id_payments) REFERENCES payments(id_payments)
);

CREATE TABLE order_details (
  id_order_details INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_orders INT(11) NOT NULL,
  id_prods INT(11) NOT NULL,
  quantities INT(11) NOT NULL,
  unit_prices DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_orders) REFERENCES orders(id_orders),
  FOREIGN KEY (id_prods) REFERENCES products(id_prods)
);