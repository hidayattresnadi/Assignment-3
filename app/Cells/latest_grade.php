<div class="card-body">
    <?php if (!empty($courses) && count($courses) > 0): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Instructor</th>
                    <th>Schedule</th>
                    <?php if ($grade): ?>
                        <th>Grade</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= esc($course['courseName']) ?></td>
                        <td><?= esc($course['courseCode']) ?></td>
                        <td><?= esc($course['instructorName']) ?></td>
                        <td><?= esc($course['schedule']) ?></td>
                        <?php if ($grade): ?>
                            <td><?= esc($course['grade']) ?></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No courses enrolled.</p>
    <?php endif; ?>
</div>