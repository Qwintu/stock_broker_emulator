
CREATE TABLE Users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100),
    nick_name VARCHAR(100),  -- add  UNIQUE NOT NULL
    email VARCHAR(100) UNIQUE NOT NULL,
    pass VARCHAR(100) NOT NULL,
    user_role VARCHAR(100),  -- owner, admin, sub_admin, user, premium_user, blocked_user, guest
    last_login TIMESTAMP DEFAULT (CURRENT_TIMESTAMP),
    reg_date TIMESTAMP DEFAULT (CURRENT_TIMESTAMP),
    manyopen DECIMAL(14,2) default 500000,
    -- 000 000 000 000 . 00
    finresult DECIMAL(14,2) default 0,   -- what is it?
    qualification INT default 0,
    LKOH INT default 0, LKOH_price DECIMAL(9,2) default 0, LKOH_limit INT default 100,
    GAZP INT default 0, GAZP_price DECIMAL(9,2) default 0, GAZP_limit INT default 4500,
    ROSN INT default 0, ROSN_price DECIMAL(9,2) default 0, ROSN_limit INT default 900,
    SBER INT default 0, SBER_price DECIMAL(9,2) default 0, SBER_limit INT default 1600,
    TATN INT default 0, TATN_price DECIMAL(9,2) default 0, TATN_limit INT default 750,
    GMKN INT default 0, GMKN_price DECIMAL(9,2) default 0, GMKN_limit INT default 3500,
    AFLT INT default 0, AFLT_price DECIMAL(9,2) default 0, AFLT_limit INT default 7700,
    AFKS INT default 0, AFKS_price DECIMAL(9,2) default 0, AFKS_limit INT default 19000,
    MOEX INT default 0, MOEX_price DECIMAL(9,2) default 0, MOEX_limit INT default 2000,
    VTBR INT default 0, VTBR_price DECIMAL(9,2) default 0, VTBR_limit INT default 25000000,
    NLMK INT default 0, NLMK_price DECIMAL(9,2) default 0, NLMK_limit INT default 2500,

    constraint fk_user_role foreign key (user_role) references User_role(role_name)
);

CREATE TABLE Dealuser(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idname BIGINT NOT NULL,   -- rename to "user_id"
    ticker VARCHAR(100) NOT NULL,
    shareprice DECIMAL(12,2) NOT NULL,
    numbershears INT NOT NULL,
    timedeal TIMESTAMP NOT NULL,
    pointticket VARCHAR(30) NOT NULL,  -- buy/sell

    constraint fk_dealuser_person_id foreign key (idname) references User(id),
    constraint fk_dealuser_person_id foreign key (ticker) references Infoticker(ticker)
    -- constraint nn_dealuser NOT NULL (idname, ticker, shareprice, numbershears, timedeal, pointticket)
);

CREATE TABLE Infoticker(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    ticker VARCHAR(100) NOT NULL,
    issuer VARCHAR(100),
    shares_in_lot INT  NOT NULL,
    sector VARCHAR(100),
    last_price DECIMAL(9,2), -- rename to "close_eod"
    open_eod DECIMAL(9,2),
    min_eod DECIMAL(9,2),
    max_eod DECIMAL(9,2)
);

CREATE TABLE User_role(
    role_id BIGINT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(100),
    role_description TEXT
    -- Permissions
);

CREATE TABLE Blog(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idname BIGINT,   -- rename to "user_id"
    add_date_blog TIMESTAMP,
    author VARCHAR(100),
    title VARCHAR(255),
    content TEXT,

    constraint fk_blog_person_id foreign key (idname) references User(id)
);