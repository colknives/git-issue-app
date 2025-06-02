import { Link } from '@inertiajs/react';
import ReactMarkdown from 'react-markdown';
import Layout from '../layout';

type Issue = {
    created_at: string;
    number: number;
    title: string;
    body: string;
};

type DetailProps = {
    issue: Issue;
};

export default function Detail(props: DetailProps) {
    const { issue } = props;

    return (
        <Layout>
            <div>
                <Link href="/">← Back to list</Link>
                <div className="mt-4">
                    <span className="text-lg">
                        #{issue.number} - {issue.title}
                    </span>
                    <p className="text-sm">
                        <strong>Created:</strong> {new Date(issue.created_at).toLocaleString()}
                    </p>
                </div>

                <div className="mt-2">
                    <ReactMarkdown>{issue.body || 'No description.'}</ReactMarkdown>
                </div>
            </div>
        </Layout>
    );
}
