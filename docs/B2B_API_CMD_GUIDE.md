# B2B Authentication API - CMD cURL Commands

## Base URLs
```
API Base URL: http://localhost:8000/api/b2b
File Storage URL: http://localhost:8000/storage
```

## File Access
Uploaded files can be accessed directly using the storage URL:
```
http://localhost:8000/storage/{file_path}
```

Example:
```
http://localhost:8000/storage/b2b/documents/nR77UVZCZHFEDs4H7hZJ_1749618678.pdf
```

Note: Make sure the storage link is created by running:
```cmd
php artisan storage:link
```

Files are stored in the `storage/app/public/b2b/documents` directory.

## 1. Register a New B2B User

### Request
```cmd
curl -X POST "http://localhost:8000/api/b2b/register" ^
  -H "Accept: application/json" ^
  -F "first_name=John" ^
  -F "last_name=Doe" ^
  -F "email=john.doe@example.com" ^
  -F "mobile_number=9876543210" ^
  -F "password=password123" ^
  -F "password_confirmation=password123" ^
  -F "company_name=ABC Corp" ^
  -F "registration_id_file=@C:\path\to\registration.pdf" ^
  -F "company_license_file=@C:\path\to\license.pdf" ^
  -F "gst_file=@C:\path\to\gst.pdf" ^
  -F "pan_file=@C:\path\to\pan.pdf" ^
  -F "aadhar_file=@C:\path\to\aadhar.pdf"
```

### Response
On successful registration, you'll receive a response containing the user data with file paths. The file paths will be relative to the storage directory. To access the files, prepend the storage URL to the file path.

Example response:
```json
{
    "message": "Registration successful. Please wait for admin approval.",
    "user": {
        "id": 1,
        "first_name": "John",
        "last_name": "Doe",
        "email": "john.doe@example.com",
        "mobile_number": "9876543210",
        "company_name": "ABC Corp",
        "registration_id_file": "b2b/documents/abc123_registration.pdf",
        "company_license_file": "b2b/documents/abc123_license.pdf",
        "gst_file": "b2b/documents/abc123_gst.pdf",
        "pan_file": "b2b/documents/abc123_pan.pdf",
        "aadhar_file": "b2b/documents/abc123_aadhar.pdf",
        "is_approved": false,
        "created_at": "2025-06-11T05:20:00.000000Z",
        "updated_at": "2025-06-11T05:20:00.000000Z"
    },
    "token": "1|abcdefghijklmnopqrstuvwxyz123456"
}
```

To access the uploaded files, use the storage URL + file path:
```
http://localhost:8000/storage/b2b/documents/abc123_registration.pdf
http://localhost:8000/storage/b2b/documents/abc123_license.pdf
http://localhost:8000/storage/b2b/documents/abc123_gst.pdf
http://localhost:8000/storage/b2b/documents/abc123_pan.pdf
http://localhost:8000/storage/b2b/documents/abc123_aadhar.pdf
```

## 2. Login

### Request
```cmd
curl -X POST "http://localhost:8000/api/b2b/login" ^
  -H "Content-Type: application/json" ^
  -H "Accept: application/json" ^
  -d "{\"email\":\"john.doe@example.com\",\"password\":\"password123\",\"device_name\":\"Windows CMD\"}"
```

### Save the token from the response for future requests
```cmd
for /f "tokens=*" %a in ('curl -s -X POST "http://localhost:8000/api/b2b/login" -H "Content-Type: application/json" -H "Accept: application/json" -d "{\"email\":\"john.doe@example.com\",\"password\":\"password123\",\"device_name\":\"Windows CMD\"}" ^| findstr /C:"token"') do set "TOKEN=%~a"
set TOKEN=%TOKEN: "token":"=%
set TOKEN=%TOKEN:",=%
echo %TOKEN%
```

## 3. Get Authenticated User

### Request
```cmd
curl -X GET "http://localhost:8000/api/b2b/me" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Using the saved token
```cmd
curl -X GET "http://localhost:8000/api/b2b/me" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer %TOKEN%"
```

## 4. Logout

### Request
```cmd
curl -X POST "http://localhost:8000/api/b2b/logout" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Using the saved token
```cmd
curl -X POST "http://localhost:8000/api/b2b/logout" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer %TOKEN%"
```

## File Upload Notes

1. **File Paths**: Always use full paths to files
   - Example: `C:\path\to\file.pdf`
   - Or with forward slashes: `C:/path/to/file.pdf`

2. **File Types**: Allowed formats:
   - Images: .jpg, .jpeg, .png
   - Documents: .pdf
   - Max file size: 2MB per file

3. **Required Documents**:
   - Registration ID
   - Company License
   - GST Document
   - PAN Card
   - Aadhar Card

## Common Issues and Solutions

1. **JSON Formatting**:
   - Escape double quotes with backslashes: `\"key\":\"value\"`
   - No trailing commas in JSON objects

2. **Connection Refused**:
   - Make sure Laravel server is running: `php artisan serve`
   - Check if port 8000 is available

3. **File Not Found**:
   - Verify the file path exists
   - Check for spaces in paths (use quotes if needed)

4. **Authentication Errors**:
   - Make sure to include the Bearer token
   - Tokens expire on logout

5. **CORS Issues**:
   - Make sure CORS is properly configured in Laravel
   - Check `cors.php` configuration

## Example Session

1. **Register**:
```cmd
curl -X POST "http://localhost:8000/api/b2b/register" ^
  -H "Accept: application/json" ^
  -F "first_name=John" ^
  -F "last_name=Doe" ^
  -F "email=john.doe@example.com" ^
  -F "mobile_number=9876543210" ^
  -F "password=password123" ^
  -F "password_confirmation=password123" ^
  -F "company_name=ABC Corp" ^
  -F "registration_id_file=@C:\documents\reg.pdf" ^
  -F "company_license_file=@C:\documents\license.pdf" ^
  -F "gst_file=@C:\documents\gst.pdf" ^
  -F "pan_file=@C:\documents\pan.pdf" ^
  -F "aadhar_file=@C:\documents\aadhar.pdf"
```

2. **Login and save token**:
```cmd
for /f "tokens=*" %a in ('curl -s -X POST "http://localhost:8000/api/b2b/login" -H "Content-Type: application/json" -H "Accept: application/json" -d "{\"email\":\"john.doe@example.com\",\"password\":\"password123\",\"device_name\":\"Windows CMD\"}" ^| findstr /C:"token"') do set "TOKEN=%~a"
set TOKEN=%TOKEN: "token":"=%
set TOKEN=%TOKEN:",=%
echo %TOKEN%
```

3. **Get user profile**:
```cmd
curl -X GET "http://localhost:8000/api/b2b/me" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer %TOKEN%"
```

4. **Logout**:
```cmd
curl -X POST "http://localhost:8000/api/b2b/logout" ^
  -H "Accept: application/json" ^
  -H "Authorization: Bearer %TOKEN%"
```

## Troubleshooting

1. **Command too long**:
   - Break long commands into multiple lines using `^`
   - Remove extra spaces after `^`

2. **Special characters in passwords**:
   - If your password has special characters, enclose it in double quotes
   - Escape inner double quotes with backslashes

3. **View full response**:
   - Add `-v` flag to see detailed request/response
   - Example: `curl -v -X GET "http://localhost:8000/api/b2b/me" ...`

4. **Save response to file**:
   ```cmd
   curl -X GET "http://localhost:8000/api/b2b/me" ^
     -H "Accept: application/json" ^
     -H "Authorization: Bearer %TOKEN%" > response.json
   ```

## Testing the API

1. Start your Laravel development server:
   ```cmd
   php artisan serve
   ```

2. Open a new CMD window and test the API using the commands above.

3. Make sure to replace placeholder values (emails, passwords, file paths) with your actual data.

4. For file uploads, ensure the files exist at the specified paths before running the commands.
