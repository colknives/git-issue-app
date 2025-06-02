import { Link } from '@inertiajs/react';
import Layout from '../layout';

type Issue = {
    created_at: string;
    number: number;
    title: string;
    repository: {
        full_name: string;
    };
};

type HomeProps = {
    issues: Issue[];
};

export default function Home(props: HomeProps) {
    const { issues } = props;

    return (
        <Layout>
            <div className="flex justify-center">
                <span className="text-xl font-bold">Your Open GitHub Issues</span>
            </div>
            {issues && issues.length > 0 ? (
                <ul className="mt-8">
                    {issues.map((issue) => (
                        <Link href={`/issue?repo=${issue.repository.full_name}&&number=${issue.number}`}>
                            <li className="rounded-sm border-1 p-4">
                                <span className="text-lg">
                                    #{issue.number} - {issue.title}
                                </span>
                                <p className="mt-2 text-sm">Created: {new Date(issue.created_at).toLocaleString()}</p>
                            </li>
                        </Link>
                    ))}
                </ul>
            ) : (
                <div className="mt-10 flex justify-center">
                    <span>No issues present</span>
                </div>
            )}
        </Layout>
    );
}
