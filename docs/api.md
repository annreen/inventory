# Inventory System API v1
Base URL: `http://localhost:8000/api/v1`
## Auth
### POST /register
Body:
```json
{
  "name": "Ann Test",
  "email": "ann@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```
Response 201 Created:
```json
{
  "success": true,
  "data": {
    "user": {},
    "token": "token"
  },
  "message": "User registered"
}
```
### POST /login
Body:
```json
{
  "email": "ann@example.com",
  "password": "password"
}
```
Response 200 OK:
```json
{
  "success": true,
  "data": {
    "user": {},
    "token": "token"
  },
  "message": "Login berhasil"
}
```
## Categories
### GET /categories
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Response 200 OK:
```json
{
  "success": true,
  "data": [],
  "message": "Data kategori berhasil ditampilkan"
}
```
### POST /categories
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```
Body:
```json
{
  "name": "Elektronik"
}
```
Response 201 Created:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Elektronik"
  },
  "message": "Kategori berhasil dibuat"
}
```
### GET /categories/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Response 200 OK:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Elektronik"
  },
  "message": "Detail kategori berhasil ditampilkan"
}
```
Response 404 Not Found:
```json
{
  "success": false,
  "message": "Kategori tidak ditemukan"
}
```
### PUT /categories/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```
Body:
```json
{
  "name": "Aksesoris Elektronik"
}
```
Response 200 OK:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Aksesoris Elektronik"
  },
  "message": "Kategori berhasil diperbarui"
}
```
### DELETE /categories/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Keterangan: admin only.
Response 204 No Content.
## Items
### GET /items
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Response 200 OK:
```json
{
  "success": true,
  "data": [],
  "message": "Data item berhasil ditampilkan"
}
```
### POST /items
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```
Body:
```json
{
  "name": "Laptop",
  "quantity": 5,
  "price": 8000000,
  "category_id": 1
}
```
Response 201 Created:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop",
    "quantity": 5,
    "price": 8000000,
    "category_id": 1
  },
  "message": "Item berhasil dibuat"
}
```
### GET /items/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Response 200 OK:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop",
    "quantity": 5,
    "price": 8000000,
    "category_id": 1
  },
  "message": "Detail item berhasil ditampilkan"
}
```
Response 404 Not Found:
```json
{
  "success": false,
  "message": "Item tidak ditemukan"
}
```
### PUT /items/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```
Body:
```json
{
  "name": "Laptop Asus",
  "quantity": 10,
  "price": 9000000,
  "category_id": 1
}
```
Response 200 OK:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop Asus",
    "quantity": 10,
    "price": 9000000,
    "category_id": 1
  },
  "message": "Item berhasil diperbarui"
}
```
### DELETE /items/{id}
Header:
```txt
Authorization: Bearer {token}
Accept: application/json
```
Keterangan: admin only.
Response 204 No Content.

### GET /items?category_id={id}
Description: Filter items by category, optional.