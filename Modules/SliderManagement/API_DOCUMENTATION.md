# Slider Management API Documentation

## Dashboard API Endpoints

### Authentication
All dashboard endpoints require authentication with `auth:admin` middleware.

### Base URL
```
/api/dashboard/
```

## CRUD Operations

### 1. Get All Sliders
```http
GET /api/dashboard/sliders
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
            "background": "https://example.com/image.jpg",
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

### 2. Get Single Slider
```http
GET /api/dashboard/sliders/{id}
```

### 3. Create New Slider
```http
POST /api/dashboard/sliders
Content-Type: multipart/form-data
```

**Request Body:**
```json
{
    "type": "hero",
    "order": 1,
    "title": {
        "en": "New Slider Title",
        "ar": "عنوان شريحة جديد"
    },
    "text": {
        "en": "Slider description in English",
        "ar": "وصف الشريحة بالعربية"
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

### 4. Update Slider
```http
PUT /api/dashboard/sliders/{id}
Content-Type: multipart/form-data
```

### 5. Delete Slider
```http
DELETE /api/dashboard/sliders/{id}
```

## Specific Type Endpoints

### Get Hero Sliders Only
```http
GET /api/dashboard/hero-sliders
```

### Get Program Sliders Only
```http
GET /api/dashboard/program-sliders
```

### Get Available Slider Types
```http
GET /api/dashboard/slider-types
```

**Response:**
```json
{
    "success": true,
    "data": {
        "hero": "Hero Section",
        "program": "Program Section"
    }
}
```

## Bulk Operations

### Bulk Delete Sliders
```http
POST /api/dashboard/sliders/bulk-delete
```

**Request Body:**
```json
{
    "ids": [1, 2, 3]
}
```

### Bulk Update Sliders
```http
POST /api/dashboard/sliders/bulk-update
```

**Request Body:**
```json
{
    "sliders": [
        {
            "id": 1,
            "type": "hero",
            "order": 1,
            "btn_active": "1"
        },
        {
            "id": 2,
            "type": "program",
            "order": 2,
            "btn_active": "0"
        }
    ]
}
```

### Reorder Sliders
```http
POST /api/dashboard/sliders/reorder
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

## Validation Rules

### Required Fields
- `type`: string, must be 'hero' or 'program'
- `title`: array with 'en' and 'ar' keys
- `text`: array with 'en' and 'ar' keys
- `btn_title`: array with 'en' and 'ar' keys
- `btn_url`: string, max 500 characters
- `btn_active`: string, must be '0' or '1'
- `background`: image file (required for create, optional for update)

### Optional Fields
- `order`: integer, minimum 0

### Image Validation
- Allowed formats: png, jpg, jpeg, gif, svg
- Maximum size: 2MB

## Error Responses

### Validation Error
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "title.en": ["The title.en field is required."],
        "type": ["The type field is required."]
    }
}
```

### Not Found Error
```json
{
    "success": false,
    "message": "Slider not found"
}
```

## Frontend API Endpoints

### Base URL
```
/api/frontend/
```

### Get All Sliders
```http
GET /api/frontend/sliders
Header: lang = ar (or en)
```

### Get Hero Sliders
```http
GET /api/frontend/hero-sliders
Header: lang = ar (or en)
```

### Get Program Sliders
```http
GET /api/frontend/program-sliders
Header: lang = ar (or en)
```

### Get Single Slider
```http
GET /api/frontend/sliders/{id}
Header: lang = ar (or en)
```

## Usage Examples

### Create Hero Slider
```bash
curl -X POST http://localhost:8000/api/dashboard/sliders \
  -H "Authorization: Bearer {admin_token}" \
  -F "type=hero" \
  -F "title[en]=Welcome" \
  -F "title[ar]=مرحباً" \
  -F "text[en]=Welcome message" \
  -F "text[ar]=رسالة ترحيب" \
  -F "btn_title[en]=Learn More" \
  -F "btn_title[ar]=اعرف المزيد" \
  -F "btn_url=/about" \
  -F "btn_active=1" \
  -F "background=@image.jpg"
```

### Get Hero Sliders for Frontend
```bash
curl -X GET http://localhost:8000/api/frontend/hero-sliders \
  -H "lang: ar"
```
