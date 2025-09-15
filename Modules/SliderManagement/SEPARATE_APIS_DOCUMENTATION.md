# Separate Hero & Program Sliders APIs Documentation

## Overview
This documentation covers the separate APIs for Hero and Program sliders, each with their own CRUD operations.

## Dashboard APIs (Admin)

### Base URL
```
/api/dashboard/
```

## Hero Sliders API

### 1. List All Hero Sliders
```http
GET /api/dashboard/hero/
Authorization: Bearer {admin_token}
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "type": "hero",
            "order": 1,
            "title": {
                "en": "Welcome to Durub Almustaqbal",
                "ar": "مرحباً بكم في دروب المستقبل"
            },
            "text": {
                "en": "Building a better future...",
                "ar": "نبني مستقبلاً أفضل..."
            },
            "background": "https://example.com/hero/image.jpg",
            "btn_url": "/about",
            "btn_title": {
                "en": "Learn More",
                "ar": "اعرف المزيد"
            },
            "btn_active": "1",
            "created_at": "2025-09-15T08:00:00.000000Z",
            "updated_at": "2025-09-15T08:00:00.000000Z"
        }
    ]
}
```

### 2. Create Hero Slider
```http
POST /api/dashboard/hero/
Authorization: Bearer {admin_token}
Content-Type: multipart/form-data
```

**Request Body:**
```json
{
    "order": 1,
    "title": {
        "en": "New Hero Title",
        "ar": "عنوان البطل الجديد"
    },
    "text": {
        "en": "Hero description in English",
        "ar": "وصف البطل بالعربية"
    },
    "background": "file_upload",
    "btn_url": "/programs",
    "btn_title": {
        "en": "View Programs",
        "ar": "عرض البرامج"
    },
    "btn_active": "1"
}
```

### 3. Show Hero Slider
```http
GET /api/dashboard/hero/{id}
Authorization: Bearer {admin_token}
```

### 4. Update Hero Slider
```http
PUT /api/dashboard/hero/{id}
Authorization: Bearer {admin_token}
Content-Type: multipart/form-data
```

### 5. Delete Hero Slider
```http
DELETE /api/dashboard/hero/{id}
Authorization: Bearer {admin_token}
```

### 6. Bulk Delete Hero Sliders
```http
POST /api/dashboard/hero/bulk-delete
Authorization: Bearer {admin_token}
```

**Request Body:**
```json
{
    "ids": [1, 2, 3]
}
```

### 7. Reorder Hero Sliders
```http
POST /api/dashboard/hero/reorder
Authorization: Bearer {admin_token}
```

**Request Body:**
```json
{
    "sliders": [
        {
            "id": 1,
            "order": 2
        },
        {
            "id": 2,
            "order": 1
        }
    ]
}
```

## Program Sliders API

### 1. List All Program Sliders
```http
GET /api/dashboard/program/
Authorization: Bearer {admin_token}
```

### 2. Create Program Slider
```http
POST /api/dashboard/program/
Authorization: Bearer {admin_token}
Content-Type: multipart/form-data
```

**Request Body:**
```json
{
    "order": 1,
    "title": {
        "en": "New Program Title",
        "ar": "عنوان البرنامج الجديد"
    },
    "text": {
        "en": "Program description in English",
        "ar": "وصف البرنامج بالعربية"
    },
    "background": "file_upload",
    "btn_url": "/programs",
    "btn_title": {
        "en": "View Programs",
        "ar": "عرض البرامج"
    },
    "btn_active": "1"
}
```

### 3. Show Program Slider
```http
GET /api/dashboard/program/{id}
Authorization: Bearer {admin_token}
```

### 4. Update Program Slider
```http
PUT /api/dashboard/program/{id}
Authorization: Bearer {admin_token}
Content-Type: multipart/form-data
```

### 5. Delete Program Slider
```http
DELETE /api/dashboard/program/{id}
Authorization: Bearer {admin_token}
```

### 6. Bulk Delete Program Sliders
```http
POST /api/dashboard/program/bulk-delete
Authorization: Bearer {admin_token}
```

**Request Body:**
```json
{
    "ids": [1, 2, 3]
}
```

### 7. Reorder Program Sliders
```http
POST /api/dashboard/program/reorder
Authorization: Bearer {admin_token}
```

**Request Body:**
```json
{
    "sliders": [
        {
            "id": 1,
            "order": 2
        },
        {
            "id": 2,
            "order": 1
        }
    ]
}
```

## Frontend APIs (Public)

### Base URL
```
/api/frontend/
```

## Hero Sliders Frontend API

### 1. List All Hero Sliders
```http
GET /api/frontend/hero/
Header: lang = ar (or en)
```

### 2. Show Hero Slider
```http
GET /api/frontend/hero/{id}
Header: lang = ar (or en)
```

## Program Sliders Frontend API

### 1. List All Program Sliders
```http
GET /api/frontend/program/
Header: lang = ar (or en)
```

### 2. Show Program Slider
```http
GET /api/frontend/program/{id}
Header: lang = ar (or en)
```

## Validation Rules

### Hero Slider Validation
- **order**: optional, integer, minimum 0
- **title**: required, array with 'en' and 'ar' keys, max 255 characters each
- **text**: required, array with 'en' and 'ar' keys, max 1000 characters each
- **btn_title**: required, array with 'en' and 'ar' keys, max 100 characters each
- **btn_url**: required, string, max 500 characters
- **btn_active**: required, string, must be '0' or '1'
- **background**: required for create, optional for update, image file, max 2MB

### Program Slider Validation
Same validation rules as Hero Slider.

## File Storage

### Hero Sliders
Images are stored in: `public/storage/uploads/sliders/hero/`

### Program Sliders
Images are stored in: `public/storage/uploads/sliders/program/`

## Usage Examples

### Create Hero Slider
```bash
curl -X POST http://localhost:8000/api/dashboard/hero/ \
  -H "Authorization: Bearer {admin_token}" \
  -F "order=1" \
  -F "title[en]=Welcome" \
  -F "title[ar]=مرحباً" \
  -F "text[en]=Welcome message" \
  -F "text[ar]=رسالة ترحيب" \
  -F "btn_title[en]=Learn More" \
  -F "btn_title[ar]=اعرف المزيد" \
  -F "btn_url=/about" \
  -F "btn_active=1" \
  -F "background=@hero_image.jpg"
```

### Create Program Slider
```bash
curl -X POST http://localhost:8000/api/dashboard/program/ \
  -H "Authorization: Bearer {admin_token}" \
  -F "order=1" \
  -F "title[en]=Our Programs" \
  -F "title[ar]=برامجنا" \
  -F "text[en]=Program description" \
  -F "text[ar]=وصف البرنامج" \
  -F "btn_title[en]=View Programs" \
  -F "btn_title[ar]=عرض البرامج" \
  -F "btn_url=/programs" \
  -F "btn_active=1" \
  -F "background=@program_image.jpg"
```

### Get Hero Sliders for Frontend
```bash
curl -X GET http://localhost:8000/api/frontend/hero/ \
  -H "lang: ar"
```

### Get Program Sliders for Frontend
```bash
curl -X GET http://localhost:8000/api/frontend/program/ \
  -H "lang: en"
```

## Error Responses

### Validation Error
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "title.en": ["Hero slider title in English is required."],
        "background": ["Hero slider background image is required."]
    }
}
```

### Not Found Error
```json
{
    "success": false,
    "message": "Hero slider not found"
}
```

## Benefits of Separate APIs

1. **Clear Separation**: Hero and Program sliders have their own dedicated endpoints
2. **Independent Management**: Each type can be managed separately
3. **Specific Validation**: Custom validation messages for each type
4. **Organized Storage**: Images stored in separate folders
5. **Better Performance**: Direct queries without type filtering
6. **Easier Maintenance**: Separate controllers for easier debugging
7. **Scalability**: Easy to add new features specific to each type
