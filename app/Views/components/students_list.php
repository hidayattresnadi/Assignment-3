<div class="container mt-4">
    <h1 class="mb-4">Student List</h1>
</div>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Study Program</th>
                    <th>Current Semester</th>
                    <th>GPA</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                {students}
                <tr>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td>{programStudy}</td>
                    <td>{currentSemester}</td>
                    <td>{gpa}</td>
                    <td>
                        <a href="students/{id}" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
                {/students}
            </tbody>
        </table>
    </div>
</div>