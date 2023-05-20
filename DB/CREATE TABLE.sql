
CREATE TABLE customers (
    customer_id INT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(100),
    zip_code VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE products (
  product_id INT PRIMARY KEY,
  slug VARCHAR(200),
  product_name VARCHAR(255),
  brand VARCHAR(100),
  category VARCHAR(100),
  description TEXT,
  regular_price DECIMAL(10, 2),
  special_price DECIMAL(10, 2),
  stock_quantity INT,
  image_url VARCHAR(255),
  video_url VARCHAR(255)DEFAULT NULL,
  rating DECIMAL(3, 2),
  is_active BOOLEAN DEFAULT TRUE
);


CREATE TABLE sale(
  sale_id INT PRIMARY KEY,
  product_id INT,
  sale_date DATE,
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);



CREATE TABLE specification (
    specification_id INT PRIMARY KEY,
    product_id INT,
    specification_name VARCHAR(255) NOT NULL,
    specification_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE customer_review(
    review_id INT PRIMARY KEY,
    product_id INT,
    customer_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review_text TEXT,
    review_date DATE,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);


CREATE TABLE cart (
    cart_id INT PRIMARY KEY,
    customer_id INT,
    product_id INT,
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);


