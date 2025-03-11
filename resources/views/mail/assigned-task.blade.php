<h2>
    {{ $task->title }}
</h2>

<p>
    Task assigned to { $task->assignedUser }.
    Description: { $task->description }.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>