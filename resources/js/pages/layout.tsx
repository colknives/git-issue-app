import { ReactNode } from 'react';

type LayoutProps = {
    children: ReactNode;
};

export default function Layout({ children }: LayoutProps) {
    return (
        <div className="mt-10 flex justify-center">
            <div className="w-150 rounded-sm border-1 p-10">{children}</div>
        </div>
    );
}
