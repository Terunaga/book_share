# Book_Share Database Structures

## Users

### users_structure
| column                | type   | constraint                |
|-----------------------|--------|---------------------------|
| name                  | string | unique, null false        |
| email                 | string | unique, null false        |
| password              | string | unique, null false        |
| confirmation password | string | unique, null false        |
| avatar                | string |                           |

### users_associations
* has_many :my_books
* has_many :loans
* has_many :borrowed_books
* has_many :reviews
* has_many :interests

## Books

### books_structure
| column   | type    | constraint              |
|----------|---------|-------------------------|
| name     | string  | unique, null false      |
| rate     | integer | null false              |
| comment  | text    |                         |
| image    | text    |                         |
| status   | integer | null false              |
| user_id  | integer | null false, foreign_key |

### books_associations
* belongs_to :user
* has_many :genres
* has_many :loans
* has_many :reviews


## Loans

### loans_structure
| column      | type    | constraint              |
|-------------|---------|-------------------------|
| borrower_id | integer | foreign_key, null false |
| lender_id   | integer | foreign_key, null false |
| book_id     | integer | foreign_key, null false |
| status      | integer | null false              |
| start_date  | date    | null false              |
| finish_date | date    | null false              |

### loans_associations
* belongs_to :user
* belongs_to :book


## Reviews

### reviews_structure
| column  | type    | constraint              |
|---------|---------|-------------------------|
| user_id | integer | foreign_key, null false |
| book_id | integer | foreign_key, null false |
| comment | text    |                         |

### reviews_associations
* belongs_to :user
* belongs_to :book


## Genres

### genres_structure
| column | type   | constraint |
|--------|--------|------------|
| genre  | string | null false |

### genres_associations
* has_many :books


## Interests

### interests_structure
| column  | type    | constraint              |
|---------|---------|-------------------------|
| user_id | integer | foreign_key, null false |
| book_id | integer | foreign_key, null false |

### reviews_associations
* belongs_to :user
* belongs_to :book


## Book_genres

### book_genres_structure
| column   | type    | constraint              |
|----------|---------|-------------------------|
| book_id  | integer | foreign_key, null false |
| genre_id | integer | foreign_key, null false |

### book_genres_associations
* belongs_to :book
* belongs_to :genre
